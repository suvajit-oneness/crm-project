<?php
namespace App\Repositories;

use App\Models\Project;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProjectContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;
/**
 * ClassProjectRepository
 *
 * @package \App\Repositories
 */
class ProjectRepository extends BaseRepository implements ProjectContract
{
    use UploadAble;

    /**
     * ProjectRepository constructor.
     * @param Project $model
     */
    public function __construct(Project $model)
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
     * @return Project|mixed
     */
    public function createProject(array $params)
    {

        try {

            $collection = collect($params);

            $project = new Project;
            $project->title = $collection['title'];

            $project->price = $collection['price'];
            $project->start_date = $collection['start_date'];
            $project->end_date = $collection['end_date'];
            $project->deadline = $collection['deadline'];
            $project->description = $collection['description'];
            $project->progress = $collection['progress'];
            $project->files = $collection['files'];
            $slug = Str::slug($collection['title'], '-');
            $slugExistCount = Project::where('slug', $slug)->count();
            if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
            $project->slug = $slug;
            $files = $collection['files'];
            $fileName = time().".".$files->getClientOriginalName();
            $files->move("File/",$fileName);
            $uploadedImage = $fileName;
            $project->files = $uploadedImage;

            $project->save();

            return $project;

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
        $project = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');

        $project->title = $collection['title'];

        $project->price = $collection['price'];
        $project->start_date = $collection['start_date'];
        $project->end_date = $collection['end_date'];
        $project->deadline = $collection['deadline'];
        $project->description = $collection['description'];
        $project->progress = $collection['progress'];
        $project->files = $collection['files'];
        $slug = Str::slug($collection['title'], '-');
        $slugExistCount = Project::where('slug', $slug)->count();
        if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $project->slug = $slug;
        $files = $collection['files'];
        $fileName = time().".".$files->getClientOriginalName();
        $files->move("File/",$fileName);
        $uploadedImage = $fileName;
        $project->files = $uploadedImage;
        // $profile_image = $collection['image'];
        // $imageName = time().".".$profile_image->getClientOriginalName();
        // $profile_image->move("categories/",$imageName);
        // $uploadedImage = $imageName;
        // $category->image = $uploadedImage;

        $project->save();

        return $project;
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
        $categories = Project::where('id',$id)->get();

        return $categories;
    }



        // csv upload

    }



