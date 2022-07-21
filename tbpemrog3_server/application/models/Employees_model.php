<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees_Model extends CI_Model{
    private $_table = 'employees';

    public function get($id)
    {
        if($id){
            $this->db->from($this->_table);

            $this->db->where('employee_id',$id);
            $query = $this->db->get()->row_array();
            return $query;
        } else{
            $this->db->from($this->_table);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update($this->_table,$data, ['employee_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table, ['employee_id' => $id]);
        return $this->db->affected_rows();
    }
}