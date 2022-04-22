<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\User;
use App\Models\Project;

use App\Contracts\CertificateContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Auth;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BlogExport;

class CertificateManagementController extends BaseController
{
    protected $CertificateRepository;

    /**
     * CertificateManagementController constructor.
     * @param BlogRepository $CertificateRepository
     */

    public function __construct(CertificateContract $CertificateRepository)
    {
        $this->CertificateRepository = $CertificateRepository;
    }

    /**
     * List all the states
     */
    public function index()
    {
        $cer = $this->CertificateRepository->listCertificate();

        $this->setPageTitle('Certificate', 'List of all Certificate');
        return view('admin.certificate.index', compact('cer'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Certificate', 'Create Certificate');

        return view('admin.certificate.create');
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
            'name_prefix' => 'required|string|min:1',
            'first_name' => 'required|string|min:1',
            'last_name' => 'required|string|min:1',
            'email' => 'required|string',
            'phone' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'title' => 'required|string',
            'grade' => 'required|string',


        ]);

        $cer = $this->CertificateRepository->createCertificate($request->except('_token'));

        if (!$cer) {
            return $this->responseRedirectBack('Error occurred while creating Certificate.', 'error', true, true);
        }
        return $this->responseRedirect('admin.certificate.index', 'Certificate has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cer = $this->CertificateRepository->findCertificateById($id);

        $this->setPageTitle('Certificate', 'Edit Certificate : '.$cer->title);
        return view('admin.certificate.edit', compact('cer'));
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
            'name_prefix' => 'required|string|min:1',
            'first_name' => 'required|string|min:1',
            'last_name' => 'required|string|min:1',
            'email' => 'required|string',
            'phone' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'title' => 'required|string',
            'grade' => 'required|string',
        ]);
        // $slug = Str::slug($request->name, '-');
        // $slugExistCount = Blog::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $params = $request->except('_token');

        $targetcer = $this->CertificateRepository->updateCertificate($params);

        if (!$targetcer) {
            return $this->responseRedirectBack('Error occurred while updating Certificate.', 'error', true, true);
        }
        return $this->responseRedirectBack('Certificate has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $targetcer = $this->CertificateRepository->deleteCertificate($id);

        if (!$targetcer) {
            return $this->responseRedirectBack('Error occurred while deleting Certificate.', 'error', true, true);
        }
        return $this->responseRedirect('admin.certificate.index', 'Certificate has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $targetcer = $this->CertificateRepository->updateCertificateStatus($params);

        if ($targetcer) {
            return response()->json(array('message'=>'Certificate status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $targetcer = $this->CertificateRepository->detailsCertificate($id);
        $cer = $targetcer[0];

        $this->setPageTitle('Certificate', 'Certificate Details : '.$cer->subject);
        return view('admin.certificate.details', compact('cer'));
    }


    // public function csvStore(Request $request)
    // {
    //     if (!empty($request->file)) {
    //         // if ($request->input('submit') != null ) {
    //         $file = $request->file('file');
    //         // File Details
    //         $filename = $file->getClientOriginalName();
    //         $extension = $file->getClientOriginalExtension();
    //         $tempPath = $file->getRealPath();
    //         $fileSize = $file->getSize();
    //         $mimeType = $file->getMimeType();

    //         // Valid File Extensions
    //         $valid_extension = array("csv");
    //         // 50MB in Bytes
    //         $maxFileSize = 50097152;
    //         // Check file extension
    //         if (in_array(strtolower($extension), $valid_extension)) {
    //             // Check file size
    //             if ($fileSize <= $maxFileSize) {
    //                 // File upload location
    //                 $location = 'admin/uploads/csv';
    //                 // Upload file
    //                 $file->move($location, $filename);
    //                 // Import CSV to Database
    //                 $filepath = public_path($location . "/" . $filename);
    //                 // Reading file
    //                 $file = fopen($filepath, "r");
    //                 $importData_arr = array();
    //                 $i = 0;
    //                 while (($filedata = fgetcsv($file, 10000, ",")) !== FALSE) {
    //                     $num = count($filedata);
    //                     // Skip first row
    //                     if ($i == 0) {
    //                         $i++;
    //                         continue;
    //                     }
    //                     for ($c = 0; $c < $num; $c++) {
    //                         $importData_arr[$i][] = $filedata[$c];
    //                     }
    //                     $i++;
    //                 }
    //                 fclose($file);

    //                 // echo '<pre>';print_r($importData_arr);exit();

    //                 // Insert into database
    //                 foreach ($importData_arr as $importData) {
    //                     $storeData = 0;
    //                     if(isset($importData[5]) == "Carry In") $storeData = 1;

    //                     $insertData = array(
    //                         "name" => isset($importData[0]) ? $importData[0] : null,
    //                         "slug" => isset($importData[1]) ? $importData[1] : null,
    //                         "blog_category_id" => isset($importData[2]) ? $importData[2] : null,
    //                         "blog_sub_category_id" => isset($importData[3]) ? $importData[3] : null,
    //                         "image" => isset($importData[4]) ? $importData[4] : null,
    //                         "content" => isset($importData[5]) ? $importData[5] : null,
    //                         "meta_title" => isset($importData[6]) ? $importData[6] : null,
    //                         "meta_key" => isset($importData[7]) ? $importData[7] : null,
    //                         "meta_description" => isset($importData[8]) ? $importData[8] : null,
    //                         "status" => isset($importData[9]) ? $importData[9] : null,
    //                         "created_at" => isset($importData[10]) ? $importData[10] : null,
    //                     );
    //                     // echo '<pre>';print_r($insertData);exit();
    //                     Blog::insertData($insertData);
    //                 }
    //                 Session::flash('message', 'Import Successful.');
    //             } else {
    //                 Session::flash('message', 'File too large. File must be less than 50MB.');
    //             }
    //         } else {
    //             Session::flash('message', 'Invalid File Extension. supported extensions are ' . implode(', ', $valid_extension));
    //         }
    //     } else {
    //         Session::flash('message', 'No file found.');
    //     }
    //     return redirect()->route('admin.blog.index');
    // }
    // // csv upload

    // public function export()
    // {
    //     return Excel::download(new BlogExport, 'blog.xlsx');
    // }
}
