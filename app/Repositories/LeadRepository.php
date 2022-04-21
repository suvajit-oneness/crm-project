<?php
namespace App\Repositories;

use App\Models\Lead;
use App\Models\User;
use App\Models\Project;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\LeadContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;
/**
 * Class StateRepository
 *
 * @package \App\Repositories
 */
class LeadRepository extends BaseRepository implements LeadContract
{
    use UploadAble;

    /**
     * BlogCategoryRepository constructor.
     * @param Lead $model
     */
    public function __construct(Lead $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listLead(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findLeadById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return State|mixed
     */
    public function createLead(array $params)
    {
        try {

            $collection = collect($params);

            $lead = new Lead;
            $lead->project_id = $collection['project_id'];
            $lead->customer_name = $collection['customer_name'];
            $lead->customer_email = $collection['customer_email'];
            $lead->customer_mobile = $collection['customer_mobile'];
            $lead->customer_phone = $collection['customer_phone'];
            $lead->customer_company = $collection['customer_company'];
            $lead->company_website = $collection['company_website'];
            $lead->customer_address = $collection['customer_address'];
            $lead->customer_country = $collection['customer_country'];
            $lead->customer_state = $collection['customer_state'];
            $lead->customer_pin = $collection['customer_pin'];
            $lead->customer_city = $collection['customer_city'];
            $lead->message = $collection['message'];
            $lead->subject = $collection['subject'];
            $lead->assigned_to = $collection['assigned_to'];


            // $slug = Str::slug($collection['name'], '-');
            // $slugExistCount = Lead::where('slug', $slug)->count();
            // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
            // $state->slug = $slug;


            $lead->save();

            return $lead;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateLead(array $params)
    {
        $lead = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');

            $lead->project_id = $collection['project_id'];
            $lead->customer_name = $collection['customer_name'];
            $lead->customer_email = $collection['customer_email'];
            $lead->customer_mobile = $collection['customer_mobile'];
            $lead->customer_phone = $collection['customer_phone'];
            $lead->customer_company = $collection['customer_company'];
            $lead->company_website = $collection['company_website'];
            $lead->customer_address = $collection['customer_address'];
            $lead->customer_country = $collection['customer_country'];
            $lead->customer_state = $collection['customer_state'];
            $lead->customer_pin = $collection['customer_pin'];
            $lead->customer_city = $collection['customer_city'];
            $lead->message = $collection['message'];
            $lead->assigned_to = $collection['assigned_to'];
            $lead->subject = $collection['subject'];
            $lead->status = $collection['status'];
        // $slug = Str::slug($collection['name'], '-');
        // $slugExistCount = Lead::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        // $lead->slug = $slug;
        // $profile_image = $collection['image'];
        // $imageName = time().".".$profile_image->getClientOriginalName();
        // $profile_image->move("categories/",$imageName);
        // $uploadedImage = $imageName;
        // $category->image = $uploadedImage;

        $lead->save();

        return $lead;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteLead($id)
    {
        $lead = $this->findOneOrFail($id);
        $lead->delete();
        return $lead;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateLeadStatus(array $params){
        $lead = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $lead->status = $collection['check_status'];
        $lead->save();

        return $lead;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function detailsLead($id)
    {
        $leadcategories = Lead::where('id',$id)->get();

        return $leadcategories;
    }

    /**
     * @return mixed
     */
    public function getuser()
    {
        return User::all();
    }

    /**
     * @return mixed
     */
    public function getproject()
    {
        return Project::all();

    }

        // csv upload

    }



