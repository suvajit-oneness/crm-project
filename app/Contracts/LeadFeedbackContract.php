<?php

namespace App\Contracts;

/**
 * Interface BlogContract
 * @package App\Contracts
 */
interface LeadFeedbackContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listLeadFeedback(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findLeadFeedbackById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createLeadFeedback(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateLeadFeedback(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteLeadFeedback($id);

    /**
     * @param $id
     * @return mixed
     */
    public function detailsLeadFeedback($id);
    /**
     * @param $id
     * @return mixed
     */
    public function updateLeadFeedbackStatus(array $params);
    /**
     * @return mixed
     */
    public function getLead();


}
