<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function get_all_subjects() {
        $this->db->select('course_name, academic_year');
        $this->db->from('subjects');
        $query = $this->db->get();
        return $query->result(); 
    }

    
    }

