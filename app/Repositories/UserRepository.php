<?php
namespace App\Repositories;

use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\UserContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract
{
    use UploadAble;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
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
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

     /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findUsersById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

     /**
     * @param array $params
     * @return User|mixed
     */
    public function createUsers(array $params)
    {
        try {

            $collection = collect($params);

            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];

            $user->mobile = $collection['mobile'];

            $user->dob = $collection['dob'];
            $user->address = $collection['address'];
            $user->city = $collection['city'];
            $user->state = $collection['state'];
            $user->country = $collection['country'];
            $user->pin = $collection['pin'];
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("User/",$imageName);
            $uploadedImage = $imageName;
            $user->image = $uploadedImage;
            $user->save();

            return $user;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateUsers(array $params)
    {
        $user = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');

        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->mobile = $collection['mobile'];
        $user->dob = $collection['dob'];
        $user->address = $collection['address'];
        $user->city = $collection['city'];
        $user->state = $collection['state'];
        $user->country = $collection['country'];
        $user->pin = $collection['pin'];
        if (isset($collection['image'])) {
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("User/",$imageName);
            $uploadedImage = $imageName;
            $user->image = $uploadedImage;
        }
        $user->save();

        return $user;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function detailsUsers(int $id)
    {
        try {
          //  $user =  User::with('loops')->where('id',$id)->get();
          $user =  User::where('id',$id)->get();
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
    public function updateUsersStatus(array $params){
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
    public function deleteUsers($id)
    {
        $user = $this->findOneOrFail($id);
        $user->delete();
        return $user;
    }
}
