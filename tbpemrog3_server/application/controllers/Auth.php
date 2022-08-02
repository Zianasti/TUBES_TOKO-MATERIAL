<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{
    public function __construct($config = 'restnokey')
    {
        parent::__construct($config);
        $this->load->model('Auth_model');
    }

    public function index_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');
        $data = $this->Auth_model->login($username, $password);
        if ($data){
            $this->response(
                [
                    'data'  => $data,
                    'status' => 'Login Berhasil',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => '',
                    'status' => 'Login Gagal',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    public function register_post()
    {
        $data = [
			"name" => $this->post('name'),
			"dob" => $this->post('dob'),
			"gender" => $this->post('gender'),
			"email" => $this->post('email'),
			"username" => $this->post('username'),
			"password" => $this->post('password'),
		];
        $register = $this->Auth_model->register($data);
        if ($register != null){
            $this->response(
                [
                    'data'  => $register,
                    'status' => 'Register Berhasil',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => '',
                    'status' => 'Register Gagal',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    public function savekey_post() {
        $data = [
            'user_id' => $this->post('user_id'),
            'key' => $this->post('key')
        ];

        $keySaved = $this->Auth_model->saveKey($data);
        if ($keySaved > 0){
            $this->response(
                [
                    'data'  => true,
                    'status' => 'API Key Tersimpan',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => '',
                    'status' => 'API key Gagal disimpan',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}