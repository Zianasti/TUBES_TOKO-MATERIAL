<?php
defined('BASEPATH') or exit ("No direct script access allowed");

class Purchase_details_Model extends CI_Model
{
    private $_table = 'purchase_details';
    public function get($id,$id2)
    {
        $this->db->from($this->_table);
        if ($id){
            $this->db->where('purchase_detail_id',$id);
        }
        if ($id2){
            $this->db->where('purchase_details.purchase_id',$id2);
        }
        $this->db->join('materials','materials.material_id = purchase_details.material_id');
        $this->db->join('purchases','purchases.purchase_id = purchase_details.purchase_id');
        $this->db->select('purchase_detail_id, qty, cost, subtotal, materials.name, materials.price, purchases.date, purchases.total, purchases.description');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert ($data)
    {
        if ($data['jenisPost'] == "radioBaru") {
            $this->db->insert('materials', [
                'material_id' => $data['material_id'],
                'name' => $data['name'],
                'stock' => $data['qty'],
                'price' => $data['price'],
                'category_id' => $data['category_id']
            ]);

            $this->db->insert($this->_table, [
                'purchase_detail_id' => $data['purchase_detail_id'],
                'qty' => $data['qty'],
                'cost' => $data['cost'],
                'subtotal' => $data['subtotal'],
                'material_id' => $data['material_id'],
                'purchase_id' => $data['purchase_id']
            ]);
            
            $this->db->from('purchases');
            $this->db->where('purchase_id', $data['purchase_id']);
            $this->db->select('total');
            $currentTotal = $this->db->get()->row();
            
            $currentTotal = intval($currentTotal->total) + $data['subtotal'];

            $this->db->update('purchases', [
                'total' => $currentTotal
            ], ['purchase_id' => $data['purchase_id']]);

            return 1;
        }
        if ($data['jenisPost'] == "radioUpdate") {
            $this->db->insert($this->_table, [
                'purchase_detail_id' => $data['purchase_detail_id'],
                'qty' => $data['qty'],
                'cost' => $data['cost'],
                'subtotal' => $data['subtotal'],
                'material_id' => $data['material_id'],
                'purchase_id' => $data['purchase_id']
            ]);

            $this->db->from('purchases');
            $this->db->where('purchase_id', $data['purchase_id']);
            $this->db->select('total');
            $currentTotal = $this->db->get()->row();
            
            $currentTotal = intval($currentTotal->total) + $data['subtotal'];

            $this->db->update('purchases', [
                'total' => $currentTotal
            ], ['purchase_id' => $data['purchase_id']]);

            $this->db->from('materials');
            $this->db->where('material_id', $data['material_id']);
            $this->db->select('stock');
            $currentStock = $this->db->get()->row();

            //update jumlah stock diambil dari qty yang baru diinput
            $currentStock = intval($currentStock->stock) + $data['qty'];

            $this->db->update('materials',[
                'stock' => $currentStock
            ], ['material_id' => $data['material_id']]);

            return 1;
        }
    }

    public function update ($data,$id)
    {
        $this->db->update($this->_table, $data, ['purchase_detail_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table,['purchase_detail_id' => $id]);
        return $this->db->affected_rows();
    }
}