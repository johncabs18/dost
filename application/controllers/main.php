<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('dost_model');
        $this->load->library('table');

    }

    public function add()
    {
          date_default_timezone_set("Asia/Manila");
        	$custname = ucwords($this->input->post('contactname',true));
        	$contact = $this->input->post('contact',true);
        	$qty = $this->input->post('quantity',true);
        	$type = ucwords($this->input->post('type',true));
        	$samplename = ucwords($this->input->post('parameters',true));
        	$testedby = ucwords($this->input->post('testedby',true));
        	$labtype = $this->input->post('labtype',true);
            $toc = $this->input->post('comtype',true);
            $year  = $this->input->post('year', true);
            $month = $this->input->post('month', true);
            $day   = $this->input->post('day', true);
            $skeddate = $year.'-'.$month.'-'.$day;/*

        	$cust_data = array(
        			'customer_name' => $custname,
        			'contact_num' => $contact
        		);
        	$customer = $this->dost_model->custAdd($cust_data);*/

        	$getId = $this->dost_model->getID($custname,$contact);

        	$sked_data = array(
        			'cust_id' 			=> $getId,
        			'sample_qty'		=> $qty,
        			'status'			=> "OK",
        			'sched_date'		=> $skeddate,
                    'parameter'         => $samplename,
                    'sample_type'       => $type,
                    'laboratory'        => $labtype,
                    'type_communication' => $toc,
                    'communication_date' => date('Y-m-d'),
                    'scheduled_by'      => $testedby,
                    'created_on'        => date('Y-m-d')
        		);
        	$schedule = $this->dost_model->skedAdd($sked_data);


        	if ($schedule) {
                redirect('home','refresh');
            } else {
                echo 'Can\'t create Customer record ...';
            }
    }
public function team()
    {
        $this->load->view('layouts/header',array(
                'title'         => 'Dept. of Science & Technology'
            ));
        $this->load->view('home/aboutus1');
        $this->load->view('layouts/footer1');

    }
public function excel($from,$to)
    {
            $report = $this->dost_model->getReport($from,$to);
            $this->load->view('home/excel',array(
                'report'   => $report
            ));

    }
public function weeklyReport()
    {

        if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $from   = $this->input->post('from', true);
             $to   = $this->input->post('to', true);
             $report = $this->dost_model->getReport($from,$to);
             $data = array(
              'name'          => $session_data['fullname'],/*
              'position'      => $session_data['position'],
              'gender'        => $session_data['gender'],
              'dob'           => $session_data['dob'],
              'address'       => $session_data['address'],*/
              'username'      => $session_data['username'],
              'password'      => $session_data['password'],
              'report'         => $report,
              'from'         => $from,
              'to'         => $to

              );
            $this->load->view('layouts/header',array(
                'title'         => 'Dept. of Science & Technology'
            ));
            $this->load->view('home/weekly_report',$data);
            $this->load->view('layouts/footer1');
           }
           else
           {
             //If no session, redirect to login page
             redirect('login', 'refresh');
           }

    }
	public function ctl()
	{
		 if($this->session->userdata('logged_in'))
		   {
          date_default_timezone_set("Asia/Manila");
		     $session_data = $this->session->userdata('logged_in');
		     $month = date('M');
		     $year = date('Y');
             $day = date('d');
		     $first_day_of_week = date($day, strtotime('Last Monday', time()));
             $custSked = $this->dost_model->getRecords();
             $type = $this->dost_model->getType();
             $cust = $this->dost_model->getCust();
             $lab = $this->dost_model->getLab();
		     $data = array(
		      'name'     	  => $session_data['fullname'],/*
		      'position'      => $session_data['position'],
		      'gender'        => $session_data['gender'],
		      'dob'           => $session_data['dob'],
		      'address'       => $session_data['address'],*/
		      'username'      => $session_data['username'],
		      'password'      => $session_data['password'],
		      'title'		  => "Dept. of Science & Technology",
		      'day'			  => $first_day_of_week,
		      'month'	      => $month,
		      'year'	      => $year,
		      'lab'			  => "ctl",
              'info'          => $custSked,
              'type'          => $type,
              'cust'          => $cust,
              'lab'          => $lab

		      );

        	$this->load->view('home/ctl',$data);
		   }
		   else
		   {
		     //If no session, redirect to login page
		     redirect('login', 'refresh');
		   }
	}
    public function update($id){
/*        $getdata = $this->dost_model->getdatas($id);
        $type = $this->dost_model->getType();
        $this->load->view('layouts/header',array(
                'title'         => 'Dept. of Science & Technology'
            ));
        $this->load->view('home/update',array(
                'id' => $id,
                'data' =>$getdata,
                'type' => $type
            ));
        $this->load->view('layouts/footer');*/
        if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $getdata = $this->dost_model->getdatas($id);
             $type = $this->dost_model->getType();
             $cust = $this->dost_model->getCust();
             $lab = $this->dost_model->getLab();
             $data = array(
              'name'          => $session_data['fullname'],/*
              'position'      => $session_data['position'],
              'gender'        => $session_data['gender'],
              'dob'           => $session_data['dob'],
              'address'       => $session_data['address'],*/
              'username'      => $session_data['username'],
              'password'      => $session_data['password'],
              'title'         => "Dept. of Science & Technology",
              'id'            => $id,
              'data'          =>$getdata,
              'type'          => $type,
              'cust'          => $cust,
              'lab'          => $lab

              );

            $this->load->view('layouts/header',array(
                'title'         => 'Dept. of Science & Technology'
            ));
            $this->load->view('home/update',$data);
           }
           else
           {
             //If no session, redirect to login page
             redirect('login', 'refresh');
           }
    }
    public function report(){
/*        $getdata = $this->dost_model->getdatas($id);
        $type = $this->dost_model->getType();
        $this->load->view('layouts/header',array(
                'title'         => 'Dept. of Science & Technology'
            ));
        $this->load->view('home/update',array(
                'id' => $id,
                'data' =>$getdata,
                'type' => $type
            ));
        $this->load->view('layouts/footer');*/
        if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $type = $this->dost_model->getType();
             $cust = $this->dost_model->getCust();
             $lab = $this->dost_model->getLab();
             $getdata = $this->dost_model->getRecords();

             $data = array(
              'name'          => $session_data['fullname'],/*
              'position'      => $session_data['position'],
              'gender'        => $session_data['gender'],
              'dob'           => $session_data['dob'],
              'address'       => $session_data['address'],*/
              'username'      => $session_data['username'],
              'password'      => $session_data['password'],
              'title'         => "Dept. of Science & Technology",
              'type'          => $type,
              'cust'          => $cust,
              'lab'          => $lab,
              'records'       => $getdata,

              );

            $this->load->view('layouts/header',array(
                'title'         => 'Dept. of Science & Technology'
            ));
            $this->load->view('home/report',$data);
            $this->load->view('layouts/footer1');
           }
           else
           {
             //If no session, redirect to login page
             redirect('login', 'refresh');
           }
    }
public function updateData()
    {
            $custname = ucwords($this->input->post('contactname',true));
            $schedId   = $this->input->post('schedId', true);
            $contact = $this->input->post('contact',true);
            $qty = $this->input->post('quantity',true);
            $type = ucwords($this->input->post('type',true));
            $samplename = ucwords($this->input->post('parameters',true));
            $testedby = ucwords($this->input->post('testedby',true));
            $labtype = $this->input->post('labtype',true);
            $toc = $this->input->post('comtype',true);
            $year  = $this->input->post('year', true);
            $month = $this->input->post('month', true);
            $day   = $this->input->post('day', true);
            $stat = ucwords($this->input->post('stat',true));
            $skeddate = $year.'-'.$month.'-'.$day;/*

            $cust_data = array(
                    'customer_name' => $custname,
                    'contact_num' => $contact
                );
            $customer = $this->dost_model->custAdd($cust_data);*/

            $getId = $this->dost_model->getID($custname,$contact);

            $sked_data = array(
                    'sample_qty'        => $qty,
                    'status'            => "OK",
                    'sched_date'        => $skeddate,
                    'parameter'         => $samplename,
                    'sample_type'       => $type,
                    'laboratory'        => $labtype,
                    'type_communication' => $toc,
                    'communication_date' => date('Y-m-d h:i:s'),
                    'scheduled_by'      => $testedby,
                    'status'      => $stat

                );
            $schedule = $this->dost_model->skedUpdate($schedId,$sked_data);

            redirect('main/update/'.$schedId,'refresh');

    }
    public function addtype()
    {
            $name = ucwords($this->input->post('type',true));
            $data = array(
                    'sample_type_name' => $name
                );
            $q = $this->dost_model->addType($data);
            redirect('home','refresh');

    }
    public function addCust()
    {
            $name = ucwords($this->input->post('custname',true));
            $contact = $this->input->post('custcontact',true);


            $cust_data = array(
                    'customer_name' => $name,
                    'contact_num' => $contact
                );
            $customer = $this->dost_model->custAdd($cust_data);
            redirect('home','refresh');

    }
    public function addLab()
    {
            $name = ucwords($this->input->post('lab',true));


            $cust_data = array(
                    'lab_name' => $name
                );
            $customer = $this->dost_model->labAdd($cust_data);
            redirect('home','refresh');

    }
    public function addnote()
    {
            $note = $this->input->post('note',true);
            $date_note = $this->input->post('date_note',true);
            $lab = $this->input->post('type_lab',true);
            $data = array(
                    'note' => $note,
                    'date_note' => $date_note,
                    'type_lab' => $lab
                );
            $q = $this->dost_model->addNote($data);
            redirect('home','refresh');

    }
    public function deletetype($id)
    {
            $q = $this->dost_model->delType($id);
            redirect('home','refresh');

    }
    public function deletelab($id)
    {
            $q = $this->dost_model->delLab($id);
            redirect('home','refresh');

    }

	public function logout()
 	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */