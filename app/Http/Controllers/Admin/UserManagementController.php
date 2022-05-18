<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Session;

class UserManagementController extends BaseController
{

    protected $UserRepository;

    /**
     * UserManagementController constructor.
     * @param UserRepository $UserRepository
     */

    public function __construct(UserContract $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * List all the users
     */
    public function index()
    {
    	$users = $this->UserRepository->listUsers();
    	$this->setPageTitle('Users', 'List of all users');
    	return view('admin.users.index',compact('users'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('User', 'Create User');

        return view('admin.users.create');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'      =>  'required|string',
            'email'      =>  'required|string',
            'address'      =>  'required|string',
            'state'      =>  'required|string',
            'city'      =>  'required|string',
            'country'      =>  'required|string',
            'pin'      =>  'required|string',
            'dob'      =>  'required|string',
            'mobile'      =>  'required|string',
            'image'     =>  'required|mimes:jpg,jpeg,png|max:10000',
        ]);

        $params = $request->except('_token');
        $user = $this->UserRepository->createUsers($params);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while creating User.', 'error', true, true);
        }
        createNotification((int) $user->id, (string) 'new_user');
        return $this->responseRedirect('admin.user.index', 'User has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetdirectory = $this->UserRepository->findUsersById($id);
       // $directory = $this->DirectoryRepository->getAllcategory();
        $this->setPageTitle('User', 'Edit User : '.$targetdirectory->name);
        return view('admin.users.edit', compact('targetdirectory'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id'      =>  'required|integer',
            'name'      =>  'required|string',
            'email'      =>  'required|string',
            'address'      =>  'required|string',
            'state'      =>  'required|string',
            'city'      =>  'required|string',
            'country'      =>  'required|string',
            'pin'      =>  'required|string',
            'dob'      =>  'required|string',
            'mobile'      =>  'required|string',
            //'image'     =>  'required|mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->except('_token');

        $targetstate = $this->UserRepository->updateUsers($params);

        if (!$targetstate) {
            return $this->responseRedirectBack('Error occurred while updating User.', 'error', true, true);
        }
        return $this->responseRedirectBack('User has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $targetdirectory = $this->UserRepository->deleteUsers($id);

        if (!$targetdirectory) {
            return $this->responseRedirectBack('Error occurred while deleting User.', 'error', true, true);
        }
        return $this->responseRedirect('admin.user.index', 'User has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $targetdirectory = $this->UserRepository->updateUsersStatus($params);

        if ($targetdirectory) {
            return response()->json(array('message'=>'User status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $targetdirectory = $this->UserRepository->detailsUsers($id);
        $user = $targetdirectory[0];

        $this->setPageTitle('User', 'User Details : '.$user->name);
        return view('admin.users.details', compact('user'));
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
                        // $storeData = 0;
                        // if(isset($importData[5]) == "Carry In") $storeData = 1;

                        $insertData = array(
                            "name" => isset($importData[0]) ? $importData[0] : null,
                            "email" => isset($importData[1]) ? $importData[1] : null,
                            "mobile" => isset($importData[2]) ? $importData[2] : null,
                            "dob" => isset($importData[3]) ? $importData[3] : null,
                            "address" => isset($importData[4]) ? $importData[4] : null,
                            "city" => isset($importData[5]) ? $importData[5] : null,
                            "state" => isset($importData[6]) ? $importData[6] : null,
                            "country" => isset($importData[7]) ? $importData[7] : null,
                            "pin" => isset($importData[8]) ? $importData[8] : null,
                            "image" => isset($importData[9]) ? $importData[9] : null,

                            "status" => isset($importData[10]) ? $importData[10] : null,
                        );
                        // echo '<pre>';print_r($insertData);exit();
                        User::insertData($insertData);
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
        return redirect()->route('admin.directory.index');
    }

    public function export()
    {
        return Excel::download(new UserExport, 'directory.xlsx');
    }
    // csv upload
}
