<?php

namespace App\Contracts;

/**
 * Interface LeadUserContract
 * @package App\Contracts
 */
interface LeadUserContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listLeaduser(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findLeaduserById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createLeaduser(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateLeaduser(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteLeaduser($id);

    /**
     * @param $id
     * @return mixed
     */
    public function detailsLeaduser($id);

    /**
     * @return mixed
     */
    public function getuser();

    /**
     * @return mixed
     */
    public function getproject();

    /**
     * @param $id
     * @return mixed
     */
    public function updateLeadStatus(array $params);

}
