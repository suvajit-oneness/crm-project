<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Lead;
use App\Models\LeadFeedback;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Services\Admin\AdminService;

class ProfileController extends BaseController
{
    protected $adminService;

    /**
     * ProfileController constructor
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function dashboard()
    {
		//$profile = $this->adminService->fetchProfile(Auth::user()->id);
        $data = (object)[];
        $data->lead = Lead::count();
        $data->project = Project::count();
        $data->comment = LeadFeedback::count();
        $lead =  Lead::where('created_at', '>', \Carbon\Carbon::now()->startOfDay())->latest('id', 'desc')->limit(10)->get();
        $newleads = Lead::where('status','1')->get();
        $ongoingleads = Lead::where('status','2')->get();
        $completeleads = Lead::where('status','3')->get();
        $cancelleads = Lead::where('status','4')->get();
        $this->setPageTitle('Dashboard', 'Manage Dashboard');
        $leaduser =  LeadFeedback::latest('id', 'desc')->limit(10)->get();
        return view('admin.dashboard.index',compact('data','lead','leaduser','newleads','ongoingleads','completeleads','cancelleads'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
		$profile = $this->adminService->fetchProfile(Auth::user()->id);
        $this->setPageTitle('Profile', 'Manage Profile');
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $updateRequest = $request->all();
        $id = Auth::user()->id;

        $this->adminService->updateProfile($updateRequest, $id);
        return $this->responseRedirectBack('Profile updated successfully.', 'success');
    }

    /**
     * @param Request $request
     */
    public function changePassword(Request $request) {
        $id = Auth::user()->id;
        $info = $this->adminService->changePassword($request, $id);

        if ($info['type'] == 'error') {
            return $this->responseRedirectBack($info['message'], $info['type'], true, true, '#password');
        } else {
            return $this->responseRedirectBack($info['message'], $info['type'], false, false, '#password');
        }
    }
}
