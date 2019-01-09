<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
    
    public function cek_login($username, $password)
    {

        $query = $this->db->query("SELECT *
                                            from user
                                            WHERE username = '$username'
                                            ");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $p = decrypt($rows->password);
                if($password == $p){
                    $newdata = array(
                        'username' => $rows->username,
                        'email' => $rows->email,
                        'level' => $rows->level,
                        'Logged' => TRUE
                    );
                    break;
                }

            }
            $this->session->set_userdata($newdata);
            return true;
        }

        return false;
    }
    
    public function loggedin(){
        return (bool) $this->session->userdata('Logged');
    }

	
}
