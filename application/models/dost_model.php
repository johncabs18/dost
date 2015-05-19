<?php
Class Dost_model extends CI_Model
{

public function createRecords($data)
    {
        $this->db->insert('user', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
public function login($username, $password)
    {

       $query = $this -> db -> select('*')
                            -> from('user')
                            -> where('username', $username)
                            -> where('password', $password)
                            -> limit(1)
                            -> get();

        if($query -> num_rows() == 1){
          foreach($query->result() as $row){
              $data = array(
                 'id'               => $row->userId,
                 'name'             => $row->name,/*
                 'gender'           => $row->gender,
                 'dob'              => $row->dob,
                 'address'          => $row->address,*/
                 'username'         => $row->username,
                 'password'         => $row->password,/*
                 'work_position'    => $row->work_position,*/
               );
            return $data;
            }
        }else{
          return FALSE;
        }
	}

public function getRecords()
    {
         $query = $this -> db -> select('*')
                            -> from('customer')
                            -> join('schedules', 'customer.cust_id = schedules.cust_id','inner')
                            -> get();

        return $query->result();
    }
public function getLab()
    {
         $query = $this -> db -> select('*')
                            -> from('lab')
                            -> get();

        return $query->result();
    }
public function getReport($from,$to)
    {
        if($from == '' && $to == ''){
            $query = $this -> db -> select('*')
                            -> from('customer')
                            -> join('schedules', 'customer.cust_id = schedules.cust_id','inner')
                            -> get();

        return $query->result();
        }else{

        $query = $this -> db -> select('*')
                            -> from('customer')
                            -> join('schedules', 'customer.cust_id = schedules.cust_id','inner')
                            ->where('schedules.created_on >= ',$from)
                            ->where('schedules.created_on <= ',$to)
                            -> get();
        return $query->result();
        }


    }

public function custAdd($data)
    {
        $this->db->insert('customer', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

public function getID($custname,$contact)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_name',$custname);
        $this->db->where('contact_num',$contact);
        $query = $this->db->get();

        foreach($query->result() as $row){
            return $row->cust_id;
        }
    }

public function skedAdd($data)
    {
        $this->db->insert('schedules', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

public function labAdd($data)
    {
        $this->db->insert('lab', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

public function getdatas($id)
    {
         $query = $this -> db -> select('*')
                            -> from('customer')
                            -> join('schedules', 'customer.cust_id = schedules.cust_id','inner')
                            -> where('schedules.sched_id',$id)
                            -> get();

        return $query->result();
    }


public function skedUpdate($id,$data)
    {
        $this->db->where('sched_id', $id);
        $this->db->update('schedules', $data);

      if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

    }



public function getType()
    {
        $this->db->select('*');
        $this->db->from('sampletype');
        $query = $this->db->get();

        return $query->result();
    }
public function getCust()
    {
        $this->db->select('*');
        $this->db->from('customer');
        $query = $this->db->get();

        return $query->result();
    }
public function addType($data)
    {
        $this->db->insert('sampletype', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
public function addNote($data)
    {
        $this->db->insert('note', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
public function delType($id)
    {
        $this->db->where('sample_cb_id', $id);
        $this->db->delete('sampletype');

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
public function delLab($id)
    {
        $this->db->where('lab_id', $id);
        $this->db->delete('lab');

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

