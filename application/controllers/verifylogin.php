<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('dost_model','',TRUE);
   $this->load->library('form_validation');
 }

 public function index()
 {
   //This method will have the credentials validation
   
   //$this->form_validation->set_rules('table', 'Table', 'required');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
    

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
      $this->load->helper(array('form'));
      $this->load->view('layouts/header',array(
                'title' => "Dept. of Science & Technology"
            ));
      $this->load->view('home/login');
      $this->load->view('layouts/footer');
   }
   else
   {
      /* $lab = $this->input->post('table');
      if($lab == 'ctl'){*/
        redirect('home','refresh');
      /*}else if($lab == 'mtl'){
        redirect('main/mtl');
      }*/
      
   }

 }

 public function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   //query the database
   $result = $this->dost_model->login($username, md5($password));
   if($result)
   {
     $sess_array = array();
       $sess_array = array(
         'fullname'         => $result['name'],/*
         'gender'           => $result['gender'],
         'dob'              => $result['dob'],
         'address'          => $result['address'],*/
         'username'         => $result['username'],
         'password'         => $result['password'],/*
         'position'         => $result['work_position']*/
       );
       $this->session->set_userdata('logged_in', $sess_array);
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

}
?>