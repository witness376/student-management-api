<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
    
        
        public function get_all_students() {
            $query = $this->db->get('students'); 
            return $query->result(); 
        }
    
       
    }
    