<?php
class products_model extends CI_Model {

    var $ProductName  = '';
    var $QuantityPerUnit = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    function get_products_by_id($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        return $query->row();
    }

    function insert_entry()
    {
        $this->form_validation->set_rules('ProductName', 'Product Name', 'required|min_length[5]|max_length[20]' );
		
		$this->ProductName  = $this->input->post('ProductName',true); 
        $this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true);         
        return $this->db->insert('products', $this);
    }

    function update_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true);         
        return $this->db->update('products', $this, array('ProductID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('ProductID',$id);
        return $this->db->delete('products');
    }

    function cek_dependensi($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->count_all('products');
        return ($query==0) ? true : false;
    }
}