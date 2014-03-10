<?php if (!defined('BASEPATH')) die();

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => -1));
        $this->load->view('include/footer');
    }

    public function event() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => 0));
        $this->load->view('include/footer');
    }

    public function fundraising() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => 1));
        $this->load->view('include/footer');
    }

    public function meeting() {
        $this->load->view('include/header', array('validSession' => TRUE)); $this->load->view('events/sidebar', array('action' => 2));
        $this->load->view('include/footer');
    }

    public function social() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => 3));
        $this->load->view('include/footer');
    }
}
