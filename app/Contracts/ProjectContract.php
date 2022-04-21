<?php

namespace App\Contracts;

/**
 * Interface ProjectContract
 * @package App\Contracts
 */
interface ProjectContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProject(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findProjectById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProject(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProject(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProject($id);

     /**
     * @param $id
     * @return mixed
     */
    public function detailsProject($id);

    /**
     * @param $id
     * @return mixed
     */
    public function updateProjectStatus(array $params);
}
