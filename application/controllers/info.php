<?php if (!defined('BASEPATH')) die();

class Info extends CI_Controller {

    public function index() {
        $this->load->view('info/header');
        $this->load->view('frontpage');
        $this->load->view('include/footer');
    }
}
