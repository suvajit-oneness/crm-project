<?php
namespace App\Repositories;

use App\Models\Permission;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\PermissionContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;
/**
 * ClassProjectRepository
 *
 * @package \App\Repositories
 */
class PermissionRepository extends BaseRepository implements PermissionContract
{
    use UploadAble;

    /**
     * PermissionRepository constructor.
     * @param Permission $model
     */
    public function __construct(Permission $model)
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
    public function listProject(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProjectById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Permission|mixed
     */
    public function createProject(array $params)
    {

        try {

            $collection = collect($params);

            $modules_id = implode(',', $collection['module_id']);
            
            $permission = new Permission;
            $permission->user_id = $collection['user_id'];
            $permission->module_id = $modules_id;
            $permission->save();

            return $permission;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProject(array $params)
    {
        $permission = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');

        $permission->title = $collection['title'];

        $permission->price = $collection['price'];
        $permission->start_date = $collection['start_date'];
        $permission->end_date = $collection['end_date'];
        $permission->deadline = $collection['deadline'];
        $permission->description = $collection['description'];
        $permission->progress = $collection['progress'];
        $permission->files = $collection['files'];
        $slug = Str::slug($collection['title'], '-');
        $slugExistCount = Permission::where('slug', $slug)->count();
        if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $permission->slug = $slug;
        $files = $collection['files'];
        $fileName = time().".".$files->getClientOriginalName();
        $files->move("File/",$fileName);
        $uploadedImage = $fileName;
        $permission->files = $uploadedImage;
        // $profile_image = $collection['image'];
        // $imageName = time().".".$profile_image->getClientOriginalName();
        // $profile_image->move("categories/",$imageName);
        // $uploadedImage = $imageName;
        // $category->image = $uploadedImage;

        $permission->save();

        return $permission;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProject($id)
    {
        $state = $this->findOneOrFail($id);
        $state->delete();
        return $state;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProjectStatus(array $params){
        $state = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $state->status = $collection['check_status'];
        $state->save();

        return $state;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function detailsProject($id)
    {
        $categories = Permission::where('id',$id)->get();

        return $categories;
    }



        // csv upload

    }