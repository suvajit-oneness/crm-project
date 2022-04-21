<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\Project;

use App\Contracts\LeadContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Auth;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BlogExport;

class LeadManagementController extends BaseController
{
    protected $LeadRepository;

    /**
     * BlogController constructor.
     * @param BlogRepository $LeadRepository
     */

    public function __construct(LeadContract $LeadRepository)
    {
        $this->LeadRepository = $LeadRepository;
    }

    /**
     * List all the states
     */
    public function index()
    {
        $lead = $this->LeadRepository->listLead();

        $this->setPageTitle('Lead', 'List of all Lead');
        return view('admin.lead.index', compact('lead'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Blog', 'Create Blog');
        $lead = $this->LeadRepository->getproject();
        $leaduser = $this->LeadRepository->getuser();
        return view('admin.lead.create',compact('lead','leaduser'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
           // 'project_id' => 'required|integer|min:1',
            'customer_name' => 'required|string|min:1',
            'customer_email' => 'required|string|min:1',
            'customer_mobile' => 'required|string|min:1',
            'customer_phone' => 'required|string',
            'customer_company' => 'required|string',
            'company_website' => 'required|string',
            'customer_address' => 'required|string',
            'customer_country' => 'required|string',
            'customer_state' => 'required|string',
            'customer_pin' => 'required|string',
            'customer_city' => 'required|string',
            'message' => 'required|string',
            'subject' => 'required|string',
            'assigned_to' => 'required|string',

        ]);

        $lead = $this->LeadRepository->createLead($request->except('_token'));

        if (!$lead) {
            return $this->responseRedirectBack('Error occurred while creating Lead.', 'error', true, true);
        }
        return $this->responseRedirect('admin.lead.index', 'Lead has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetlead = $this->LeadRepository->findLeadById($id);
        $lead = $this->LeadRepository->getproject();
        $leadcat = $this->LeadRepository->getuser();
        $this->setPageTitle('Lead', 'Edit Lead : '.$targetlead->customer_name);
        return view('admin.lead.edit', compact('targetlead','lead','leadcat'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $request->validate([
            //'project_id' => 'required|integer|min:1',
            'customer_name' => 'required|string|min:1',
            'customer_email' => 'required|string|min:1',
            'customer_mobile' => 'required|string|min:1',
            'customer_phone' => 'required|string',
            'customer_company' => 'required|string',
            'company_website' => 'required|string',
            'customer_address' => 'required|string',
            'customer_country' => 'required|string',
            'customer_state' => 'required|string',
            'customer_pin' => 'required|string',
            'customer_city' => 'required|string',
            'message' => 'required|string',
            'subject' => 'required|string',
            'assigned_to' => 'required|string',
        ]);
        // $slug = Str::slug($request->name, '-');
        // $slugExistCount = Blog::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $params = $request->except('_token');

        $targetlead = $this->LeadRepository->updateLead($params);

        if (!$targetlead) {
            return $this->responseRedirectBack('Error occurred while updating Lead.', 'error', true, true);
        }
        return $this->responseRedirectBack('Lead has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $targetlead = $this->LeadRepository->deleteLead($id);

        if (!$targetlead) {
            return $this->responseRedirectBack('Error occurred while deleting Lead.', 'error', true, true);
        }
        return $this->responseRedirect('admin.lead.index', 'Lead has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $targetlead = $this->LeadRepository->updateLeadStatus($params);

        if ($targetlead) {
            return response()->json(array('message'=>'Lead status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $targetlead = $this->LeadRepository->detailsLead($id);
        $lead = $targetlead[0];

        $this->setPageTitle('Lead', 'Lead Details : '.$lead->subject);
        return view('admin.lead.details', compact('lead'));
    }


    public function csvStore(Request $request)
    {
        if (!empty($request->file)) {
            // if ($request->input('submit') != null ) {
            $file = $request->file('file');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");
            // 50MB in Bytes
            $maxFileSize = 50097152;
            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {
                // Check file size
                if ($fileSize <= $maxFileSize) {
                    // File upload location
                    $location = 'admin/uploads/csv';
                    // Upload file
                    $file->move($location, $filename);
                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 10000, ",")) !== FALSE) {
                        $num = count($filedata);
                        // Skip first row
                        if ($i == 0) {
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    // echo '<pre>';print_r($importData_arr);exit();

                    // Insert into database
                    foreach ($importData_arr as $importData) {
                        $storeData = 0;
                        if(isset($importData[5]) == "Carry In") $storeData = 1;

                        $insertData = array(
                            "name" => isset($importData[0]) ? $importData[0] : null,
                            "slug" => isset($importData[1]) ? $importData[1] : null,
                            "blog_category_id" => isset($importData[2]) ? $importData[2] : null,
                            "blog_sub_category_id" => isset($importData[3]) ? $importData[3] : null,
                            "image" => isset($importData[4]) ? $importData[4] : null,
                            "content" => isset($importData[5]) ? $importData[5] : null,
                            "meta_title" => isset($importData[6]) ? $importData[6] : null,
                            "meta_key" => isset($importData[7]) ? $importData[7] : null,
                            "meta_description" => isset($importData[8]) ? $importData[8] : null,
                            "status" => isset($importData[9]) ? $importData[9] : null,
                            "created_at" => isset($importData[10]) ? $importData[10] : null,
                        );
                        // echo '<pre>';print_r($insertData);exit();
                        Blog::insertData($insertData);
                    }
                    Session::flash('message', 'Import Successful.');
                } else {
                    Session::flash('message', 'File too large. File must be less than 50MB.');
                }
            } else {
                Session::flash('message', 'Invalid File Extension. supported extensions are ' . implode(', ', $valid_extension));
            }
        } else {
            Session::flash('message', 'No file found.');
        }
        return redirect()->route('admin.blog.index');
    }
    // csv upload

    public function export()
    {
        return Excel::download(new BlogExport, 'blog.xlsx');
    }
}
