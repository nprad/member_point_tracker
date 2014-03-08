<?php if (!defined('BASEPATH')) die();

class Frontpage extends Main_Controller {

    public function index() {
        $this->load->helper('form');
        $this->load->library('parse');
        $user = $this->parse->ParseUser();
        $validSes = $user->validateSessionToken($this->session->userdata('sessionToken'));
        $this->load->view('include/header', array('validSession' => $validSes));
        $this->load->view('frontpage');
        $this->load->view('include/footer');
    }
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
