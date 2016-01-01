<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Wahyu Widodo
 * @copyright 2013
 */

class Mytemplate {

     var $instan;
    
    public function __construct()
    {    
		$this->instan = &get_instance();    	
    }
    
    public function loadBackend($nama_view,$data='')
    {
        $data['content']=$this->instan->load->view('backend/'.$nama_view,$data,TRUE);       
		$this->instan->load->view('layout_backend',$data);
    }
    
    function menu_admin(){		
		
        $menuLabel=	array("home"=>"Home",
						  "categories"=>"Categories",
						  "customers"=>"Customers",
						  "employees"=>"Employees",
                          "products"=>"Products",
                          "shippers"=>"Shippers",
                          "suppliers"=>"Suppliers",
                          "orders"=>"Orders");
        $menu="<ul>";
        foreach($menuLabel as $mL=>$mn){        
			$menu.="<li>".anchor(site_url('backend/'.$mL),"<span>".$mn."</span>")."</li>";
		} 
        $menu.="</ul>";
        return $menu;
    }
	
	
	
}

/* End of file Someclass.php */