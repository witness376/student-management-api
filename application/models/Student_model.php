<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
    
        
        public function get_all_students() {
            $this->db->limit(10);
            $query = $this->db->get('students'); 
            return $query->result(); 
        }
    
       
    }
    