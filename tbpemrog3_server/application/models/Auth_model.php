<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model{
    private $_table = 'users';

    public function login($username, $password)
    {
        $this->db->from($this->_table);

        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }
}