<?php if (!defined('BASEPATH')) die();

/**
 * Controller for the frontpage, if it ever happens
 *
 * @author Sam
 */
class Info extends CI_Controller {

    public function index() {
        $this->load->view('info/header');
        $this->load->view('frontpage');
        $this->load->view('include/footer');
    }
}
