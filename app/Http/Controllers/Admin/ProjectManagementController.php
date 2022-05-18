<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Contracts\ProjectContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Auth;
use Session;

class ProjectManagementController extends BaseController
{
    protected $ProjectRepository;

    /**
     * ProjectManagementController constructor.
     * @param ProjectRepository $ProjectRepository
     */

    public function __construct(ProjectContract $ProjectRepository)
    {
        $this->ProjectRepository = $ProjectRepository;
    }

    /**
     * List all the states
     */
    public function index()
    {
        $project = $this->ProjectRepository->listProject();

        $this->setPageTitle('Project', 'List of all project');
        return view('admin.project.index', compact('project'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Project', 'Create Project');
        return view('admin.project.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //    dd($request->all());
        $this->validate($request, [
            'title'      =>  'required|string|min:0',
            'price'      =>  'required|string|min:0',
            'start_date'      =>  'required|string|min:0',
            'end_date'      =>  'required|string|min:0',
            'deadline'      =>  'required|string|min:0',
            'description'      =>  'required|string|min:0',
            'progress'      =>  'required|string|min:0',
            'files'      =>  'required|mimes:jpg,jpeg,png,pdf,doc,csv,excel|max:1000',
        ]);
        $slug = Str::slug($request->title, '-');
        $slugExistCount = Project::where('slug', $slug)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);

        // send slug
        request()->merge(['slug' => $slug]);

        $params = $request->except('_token');

        $project = $this->ProjectRepository->createProject($params);

        if (!$project) {
            return $this->responseRedirectBack('Error occurred while creating Project.', 'error', true, true);
        }
        return $this->responseRedirect('admin.project.index', 'Project has been created successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetproject = $this->ProjectRepository->findProjectById($id);

        $this->setPageTitle('Project', 'Edit project : ' . $targetproject->title);
        return view('admin.project.edit', compact('targetproject'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title'      =>  'required|string|min:0',
            'slug'   =>  'required|string|min:0',
            'price'      =>  'required|string|min:0',
            'start_date'      =>  'required|string|min:0',
            'end_date'      =>  'required|string|min:0',
            'deadline'      =>  'required|string|min:0',
            'description'      =>  'required|string|min:0',
            'progress'      =>  'required|string|min:0',
            'files'      =>  'nullable|mimes:jpg,jpeg,png|max:100000',

        ]);
        $slug = Str::slug($request->title, '-');
        $slugExistCount = Project::where('slug', $slug)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        $params = $request->except('_token');
        // return $params;

        $targetproject = $this->ProjectRepository->updateProject($params);

        if (!$targetproject) {
            return $this->responseRedirectBack('Error occurred while updating Project.', 'error', true, true);
        }
        return $this->responseRedirectBack('Project has been updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $targetproject = $this->ProjectRepository->deleteProject($id);

        if (!$targetproject) {
            return $this->responseRedirectBack('Error occurred while deleting Project.', 'error', true, true);
        }
        return $this->responseRedirect('admin.project.index', 'Project has been deleted successfully', 'success', false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request)
    {

        $params = $request->except('_token');

        $targetproject = $this->ProjectRepository->updateProjectStatus($params);

        if ($targetproject) {
            return response()->json(array('message' => 'Project status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $targetproject = $this->ProjectRepository->detailsProject($id);
        $project = $targetproject[0];

        $this->setPageTitle('Project', 'Project Details : ' . $project->title);
        return view('admin.project.details', compact('project'));
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
                        if (isset($importData[5]) == "Carry In") $storeData = 1;

                        $insertData = array(
                            "name" => isset($importData[0]) ? $importData[0] : null,
                            "slug" => isset($importData[0]) ? $importData[0] : null,

                        );
                        // echo '<pre>';print_r($insertData);exit();
                        Project::insertData($insertData);
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
        return redirect()->route('admin.state.index');
    }
    // csv upload
}
