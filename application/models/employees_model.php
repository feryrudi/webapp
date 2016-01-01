<?php
class Employees_model extends CI_Model {

    var $FirstName  = '';
    var $Title = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_employees()
    {
        $query = $this->db->get('employees');
        return $query->result();
    }

    function get_employees_by_id($id)
    {
        $this->db->where('EmployeeID',$id);
        $query = $this->db->get('employees');
        return $query->row();
    }

    function insert_entry()
    {
        $this->FirstName  = $this->input->post('FirstName',true); 
        $this->Title   = $this->input->post('Title',true);         
        return $this->db->insert('employees', $this);
    }

    function update_entry()
    {
        $this->FirstName  = $this->input->post('FirstName',true); 
        $this->Title   = $this->input->post('Title',true);         
        return $this->db->update('employees', $this, array('EmployeeID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('EmployeeID',$id);
        return $this->db->delete('employees');
    }

    function cek_dependensi($id)
    {
        $this->db->where('EmployeeID',$id);
        $query = $this->db->count_all('employees');
        return ($query==0) ? true : false;
    }
}