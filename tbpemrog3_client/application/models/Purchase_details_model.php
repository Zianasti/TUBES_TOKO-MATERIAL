<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Purchase_details_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/purchase_details',
            // 'auth'  => ['ulbi', 'pemrograman3']
        ]);
    }

    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            // 'query' => [
            //     'KEY' => 'ulbi123'
            // ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getPurchases() {
        $getPurchases = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/purchases'
        ]);

        $response = $getPurchases->request('GET', '');

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getMaterialCategories() {
        $getMaterialCategories = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/material_categories'
        ]);

        $response = $getMaterialCategories->request('GET', '');

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result['data'];
    }

    public function getMaterials() {
        $getMaterials = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/materials'
        ]);

        $response = $getMaterials->request('GET', '');

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result['data'];
    }

    public function getById($id) {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                // 'KEY' => 'ulbi123',
                'purchase_id' => $id
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

    public function saveExisting($data) {
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

    public function delete($id) {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false,
                // 'KEY' => 'ulbi123',
                'purchase_id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
