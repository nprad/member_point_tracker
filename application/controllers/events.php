<?php if (!defined('BASEPATH')) die();

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('users/login');
        }
    }

    public function view() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('include/footer');
    }
}
