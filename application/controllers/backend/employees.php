<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('Employees_model','datamodel');     
    }
	   
	public function index()
	{
		$data['title']='List Of employees';	
		$data['array_employees'] = $this->datamodel->get_employees();
		$this->mytemplate->loadBackend('employees',$data);
	}

	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add employees' : 'Update employees';				
		$data['employees'] = ($mode=='update') ? $this->datamodel->get_employees_by_id($id) : '';
		$this->mytemplate->loadBackend('frmemployees',$data);	
	}

	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/employees'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

