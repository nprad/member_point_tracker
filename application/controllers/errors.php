<?php if (!defined('BASEPATH')) die();

class Errors extends CI_Controller {

    public function four_oh_four() {
        if (!$this->session->userdata('loggedIn')) {
            $this->load->helper('form');
            $this->load->view('include/header', array('validSession' => FALSE));
        } else {
            $this->load->view('include/header', array('validSession' => TRUE));
        }

        $this->load->view('errors/four_oh_four');
        $this->load->view('include/footer');
    }
}

