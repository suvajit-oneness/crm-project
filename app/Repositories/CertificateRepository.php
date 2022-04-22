<?php
namespace App\Repositories;

use App\Models\Certificate;
use App\Models\Lead;
use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CertificateContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CertificateRepository
 *
 * @package \App\Repositories
 */
class CertificateRepository extends BaseRepository implements CertificateContract
{
    use UploadAble;

    /**
     * CertificateRepository constructor.
     * @param Certificate $model
     */
    public function __construct(Certificate $model)
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
    public function listCertificate(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

     /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCertificateById(int $id)
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
    public function createCertificate(array $params)
    {
        try {

            $collection = collect($params);

            $cer = new Certificate;
            $cer->name_prefix = $collection['name_prefix'];
            $cer->first_name = $collection['first_name'];
            $cer->last_name = $collection['last_name'];
            $cer->email = $collection['email'];
            $cer->phone = $collection['phone'];
            $cer->start_date = $collection['start_date'];
            $cer->end_date = $collection['end_date'];
            $cer->title = $collection['title'];
            $cer->grade = $collection['grade'];
            $cer->save();
            return $cer;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateCertificate(array $params)
    {
        $cer = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $cer->name_prefix = $collection['name_prefix'];
        $cer->first_name = $collection['first_name'];
        $cer->last_name = $collection['last_name'];
        $cer->email = $collection['email'];
        $cer->phone = $collection['phone'];
        $cer->start_date = $collection['start_date'];
        $cer->end_date = $collection['end_date'];
        $cer->title = $collection['title'];
        $cer->grade = $collection['grade'];
        $cer->save();
        return $cer;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function detailsCertificate($id)
    {
        try {
          //  $user =  User::with('loops')->where('id',$id)->get();
          $cer =  Certificate::where('id',$id)->get();
            //return $this->findOneOrFail($id);

            return $cer;

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }





     /**
     * @param array $params
     * @return mixed
     */
    public function updateCertificateStatus(array $params){
        $cer = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $cer->status = $collection['check_status'];
        $cer->save();

        return $cer;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCertificate($id)
    {
        $cer = $this->findOneOrFail($id);
        $cer->delete();
        return $cer;
    }

    /**
     * @return mixed
     */
    public function getproject(){
        return Lead::all();
    }
    /**
     * @return mixed
     */
    public function getUser(){
        return User::all();
    }
}
