<?php if (!defined('BASEPATH')) die();

class Dash extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    public function requirements() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('dash/sidebar', array('action' => 0));
        $this->load->view('include/footer');
    }

    public function point_requests() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('dash/sidebar', array('action' => 1));
        $this->load->view('include/footer');
    }

    public function messages() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('dash/sidebar', array('action' => 2));
        $this->load->view('include/footer');
    }

    public function settings() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('dash/sidebar', array('action' => 3));
        $this->load->view('include/footer');
    }

}
