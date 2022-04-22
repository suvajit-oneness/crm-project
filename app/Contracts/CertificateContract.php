<?php

namespace App\Contracts;

/**
 * Interface LeadContract
 * @package App\Contracts
 */
interface CertificateContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCertificate(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCertificateById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCertificate(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCertificate(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCertificate($id);

    /**
     * @param $id
     * @return mixed
     */
    public function detailsCertificate($id);

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
    public function updateCertificateStatus(array $params);

}
