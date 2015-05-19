<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
       
    }
	public function index()
	{
		$this->load->view('layouts/header',array(
				'title'			=> 'Dept. of Science & Technology'
			));
		$this->load->view('home/login');
		$this->load->view('layouts/footer');
	
	}
	public function team()
	{
		$this->load->view('layouts/header',array(
				'title'			=> 'Dept. of Science & Technology'
			));
		$this->load->view('home/aboutus');
		$this->load->view('layouts/footer');
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */