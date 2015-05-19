<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('dost_model');
       
    }
	public function index()
	{
		$this->load->view('layouts/header',array(
				'title'			=> 'Dept. of Science & Technology'
			));
		$this->load->view('home/login');
		$this->load->view('layouts/footer');
	
	}

	public function saveUser()
	{
        $this->form_validation->set_rules('fname', 'Fullname', 'required');/*
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');*/
        $this->form_validation->set_rules('username1', 'Username', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->index();
        }else{
            $year  = $this->input->post('year', true);
            $month = $this->input->post('month', true);
            $day   = $this->input->post('day', true);

            $data = array(
                'name'     		   => ucwords($this->input->post('fname', true)),/*
                'work_position'    => ucwords($this->input->post('position', true)),
                'gender'           => $this->input->post('gender', true),
                'dob'              => $year.'-'.$month.'-'.$day,
                'name'     		   => ucwords($this->input->post('fname', true)),
                'address'     	   => ucwords($this->input->post('address', true)),*/
                'username'         => $this->input->post('username1', true),
                'password'         => md5($this->input->post('password1', true)),
                'createdOn'        => date('Y-m-d H:i:s')
            );
            $confirm = $this->dost_model->createRecords($data);
            if ($confirm) {
                redirect('login','refresh');
            } else {
                echo 'Can\'t create user record ...';
            }
        }
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */