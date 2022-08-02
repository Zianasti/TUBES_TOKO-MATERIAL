<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Sales_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/sales',
            'auth'  => ['user', 'password'],
        ]);
    }

    public function getAll($key)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => $key
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getSaleDetails($id,$key) {
        $getSaleDetails = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/sale_details',
            'auth'  => ['user','password']
        ]);

        $response = $getSaleDetails->request('GET', '', [
            'query' => [
                'KEY' => $key,
                'Sale_id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getEmployees($key) {
        $getSupplier = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/employees',
            'auth'  => ['user', 'password']
        ]);

        $response = $getSupplier->request('GET', '', [
            'query' => [
                'KEY' => $key,
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getById($id,$key) {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => $key,
                'sale_id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function save($data) {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function update($data) {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function delete($id,$key) {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false,
                'KEY' => $key,
                'sale_id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}

