<?php
defined('BASEPATH') or exit ("No direct script access allowed");

class Sales_Model extends CI_Model
{
    private $_table = 'sales';
    public function get($id)
    {
        $this->db->from($this->_table);
        if ($id){
            $this->db->where('sale_id',$id);
        }
        $this->db->join('employees','employees.employee_id = sales.employee_id');
        $this->db->select('sale_id, date, pay, total, money_change, employees.name');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert ($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }

    public function update ($data,$id)
    {
        $this->db->update($this->_table, $data, ['sale_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table,['sale_id' => $id]);
        return $this->db->affected_rows();
    }
}