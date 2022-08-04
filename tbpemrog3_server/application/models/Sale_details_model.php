<?php
defined('BASEPATH') or exit ("No direct script access allowed");

class Sale_details_Model extends CI_Model
{
    private $_table = 'sale_details';
    public function get($id,$id2)
    {
        $this->db->from($this->_table);
        if ($id){
            $this->db->where('sale_detail_id',$id);
        }
        if ($id2){
            $this->db->where('sale_details.sale_id',$id2);
        }
        $this->db->join('materials','materials.material_id = sale_details.material_id');
        $this->db->join('sales','sales.sale_id = sale_details.sale_id');
        $this->db->select('sale_detail_id, qty, disc, subtotal, materials.name, materials.price, sales.date, sales.pay, sales.total, sales.money_change');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert ($data)
    {
        if ($data) {
            $this->db->insert($this->_table, [
                'sale_detail_id' => '',
                'qty' => $data['qty'],
                'disc' => $data['disc'],
                'subtotal' => $data['subtotal'],
                'material_id' => $data['material_id'],
                'sale_id' => $data['sale_id']
            ]);

            $this->db->from('materials');
            $this->db->where('material_id', $data['material_id']);
            $this->db->select('stock');
            $currentStock = $this->db->get()->row();

            //update jumlah stock diambil dari qty yang baru diinput
            $currentStock = intval($currentStock->stock) - $data['qty'];

            $this->db->update('materials',[
                'stock' => $currentStock
            ], ['material_id' => $data['material_id']]);

            return 1;
        }
    }

    public function update ($data,$id)
    {
        $this->db->update($this->_table, $data, ['sale_detail_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table,['sale_detail_id' => $id]);
        return $this->db->affected_rows();
    }
}