<?php
class Categories_model extends CI_Model {

    var $CategoryName  = '';
    var $Description = '';
	var $Picture = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_categories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    function get_categories_by_id($id)
    {
        $this->db->where('CategoryID',$id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    function insert_entry($file)
    {
        $this->CategoryName  = $this->input->post('CategoryName',true); 
        $this->Description   = $this->input->post('Description',true);         
		$this->Picture   = $file;//$this->input->post('userfile',true);
        return $this->db->insert('categories', $this);
    }

    function update_entry($file)
    {
        $this->CategoryName  = $this->input->post('CategoryName',true); 
        $this->Description   = $this->input->post('Description',true);  
		$this->Picture   = $file;		
        return $this->db->update('categories', $this, array('CategoryID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('CategoryID',$id);
        return $this->db->delete('categories');
    }

    function cek_dependensi($id)
    {
        $this->db->where('CategoryID',$id);
        $query = $this->db->count_all('categories');
        return ($query==0) ? true : false;
    }
	
}