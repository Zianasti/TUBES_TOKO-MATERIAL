<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Materials_Model extends CI_Model
{
    private $_table = 'materials';

    public function get($id)
    {
        $this->db->from($this->_table);
        if ($id){
            $this->db->where('material_id', $id);
        }
        $this->db->join('material_categories', 'material_categories.category_id = materials.category_id');
        $this->db->select('material_id, materials.name, stock, price, material_categories.category_id, material_categories.name as category_name');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }

    public function update($data,$id)
    {
        $this->db->update($this->_table, $data, ['material_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table,['material_id' => $id]);
        return $this->db->affected_rows();
    }
}