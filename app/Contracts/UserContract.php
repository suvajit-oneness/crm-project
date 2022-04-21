<?php

namespace App\Contracts;

/**
 * Interface AdsContract
 * @package App\Contracts
 */
interface UserContract
{
	/**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findUsersById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createUsers(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUsers(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteUsers($id);

     /**
     * @param $id
     * @return mixed
     */
    public function detailsUsers(int $id);

    public function updateUsersStatus(array $params);
}
