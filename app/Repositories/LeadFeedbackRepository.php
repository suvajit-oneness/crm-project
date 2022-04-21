<?php
namespace App\Repositories;

use App\Models\LeadFeedback;
use App\Models\Lead;
use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\LeadFeedbackContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class LeadFeedbackRepository
 *
 * @package \App\Repositories
 */
class LeadFeedbackRepository extends BaseRepository implements LeadFeedbackContract
{
    use UploadAble;

    /**
     * UserRepository constructor.
     * @param LeadFeedback $model
     */
    public function __construct(LeadFeedback $model)
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
    public function listLeadFeedback(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

     /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findLeadFeedbackById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

     /**
     * @param array $params
     * @return LeadFeedback|mixed
     */
    public function createLeadFeedback(array $params)
    {
        try {

            $collection = collect($params);

            $user = new LeadFeedback;
            $user->lead_id = $collection['lead_id'];
            $user->user_id = $collection['user_id'];
            $user->comment = $collection['comment'];
            $user->reminder_date = $collection['reminder_date'];
            $user->reminder_time = $collection['reminder_time'];
            $user->save();
            return $user;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateLeadFeedback(array $params)
    {
        $user = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $user->lead_id = $collection['lead_id'];
        $user->user_id = $collection['user_id'];
        $user->comment = $collection['comment'];
        $user->reminder_date = $collection['reminder_date'];
        $user->reminder_time = $collection['reminder_time'];
        $user->save();
        return $user;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function detailsLeadFeedback($id)
    {
        try {
          //  $user =  User::with('loops')->where('id',$id)->get();
          $user =  LeadFeedback::where('id',$id)->get();
            //return $this->findOneOrFail($id);

            return $user;

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }





     /**
     * @param array $params
     * @return mixed
     */
    public function updateLeadFeedbackStatus(array $params){
        $user = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $user->status = $collection['check_status'];
        $user->save();

        return $user;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteLeadFeedback($id)
    {
        $user = $this->findOneOrFail($id);
        $user->delete();
        return $user;
    }

    /**
     * @return mixed
     */
    public function getLead(){
        return Lead::all();
    }
    /**
     * @return mixed
     */
    public function getUser(){
        return User::all();
    }
}
