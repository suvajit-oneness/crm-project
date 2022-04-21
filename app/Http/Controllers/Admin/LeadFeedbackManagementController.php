<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\Project;

use App\Contracts\LeadFeedbackContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Auth;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BlogExport;

class LeadFeedbackManagementController extends BaseController
{
    protected $LeadFeedbackRepository;

    /**
     * LeadFeedbackManagementController constructor.
     * @param LeadFeedbackRepository $LeadFeedbackRepository
     */

    public function __construct(LeadFeedbackContract $LeadFeedbackRepository)
    {
        $this->LeadFeedbackRepository = $LeadFeedbackRepository;
    }

    /**
     * List all the states
     */
    public function index()
    {
        $lead = $this->LeadFeedbackRepository->listLeadFeedback();

        $this->setPageTitle('LeadFeedback', 'List of all Lead Feedback');
        return view('admin.leadfeedback.index', compact('lead'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('LeadFeedback', 'Create LeadFeedback');
        $lead = $this->LeadFeedbackRepository->getLead();
        $user = $this->LeadFeedbackRepository->getUser();
        return view('admin.leadfeedback.create',compact('lead','user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'required|integer|min:1',
            'user_id' => 'required|integer|min:1',
            'comment' => 'required|string|min:1',
            'reminder_date' => 'required|date|min:1',
            'reminder_time' => 'required|string|min:1',


        ]);

        $lead = $this->LeadFeedbackRepository->createLeadFeedback($request->except('_token'));

        if (!$lead) {
            return $this->responseRedirectBack('Error occurred while creating Lead.', 'error', true, true);
        }
        return $this->responseRedirect('admin.leadfeedback.index', 'Lead has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetlead = $this->LeadFeedbackRepository->findLeadFeedbackById($id);
        $lead = $this->LeadFeedbackRepository->getLead();
        $user = $this->LeadFeedbackRepository->getUser();
        $this->setPageTitle('LeadFeedback', 'Edit LeadFeedback : '.$targetlead->comment);
        return view('admin.leadfeedback.edit', compact('targetlead','lead','user'));
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
            'lead_id' => 'required|integer|min:1',
            'user_id' => 'required|integer|min:1',
            'comment' => 'required|string|min:1',
            'reminder_date' => 'required|date|min:1',
            'reminder_time' => 'required|string|min:1',

        ]);
        // $slug = Str::slug($request->name, '-');
        // $slugExistCount = Blog::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $params = $request->except('_token');

        $targetlead = $this->LeadFeedbackRepository->updateLeadFeedback($params);

        if (!$targetlead) {
            return $this->responseRedirectBack('Error occurred while updating LeadFeedback.', 'error', true, true);
        }
        return $this->responseRedirectBack('LeadFeedback has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $targetlead = $this->LeadFeedbackRepository->deleteLeadFeedback($id);

        if (!$targetlead) {
            return $this->responseRedirectBack('Error occurred while deleting LeadFeedback.', 'error', true, true);
        }
        return $this->responseRedirect('admin.leadfeedback.index', 'LeadFeedback has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $targetlead = $this->LeadFeedbackRepository->updateLeadFeedbackStatus($params);

        if ($targetlead) {
            return response()->json(array('message'=>'LeadFeedback status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $targetlead = $this->LeadFeedbackRepository->detailsLeadFeedback($id);
        $lead = $targetlead[0];

        $this->setPageTitle('LeadFeedback', 'LeadFeedback Details : '.$lead->comment);
        return view('admin.leadfeedback.details', compact('lead'));
    }



}
