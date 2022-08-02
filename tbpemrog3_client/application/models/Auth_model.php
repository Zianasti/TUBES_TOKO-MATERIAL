<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Auth_model extends CI_Model {

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/auth',
        ]);
    }

    public function loginAttempt($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result;
    }

    public function registerAttempt($data)
    {
        $registerUri = $this->_guzzle = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/auth/register',
        ]);

        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result;
    }

    public function saveKey($data) {
        $saveKeyUri = new Client([
            'base_uri' => 'http://tbpemrog3.test/tbpemrog3_server/auth/savekey',
        ]);

        $response = $saveKeyUri->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result;
    }
}