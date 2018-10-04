<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

	public function index()
	{
                $data['set_frontend']= $this->Common_model->get_records_fromtables();
                 
		$this->load->view('welcome_message',$data);
	}
        
       
}
