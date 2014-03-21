<?php if (!defined('BASEPATH')) die();

/**
 * Controller that serves up all errors
 *
 * @author Sam
 */
class Errors extends CI_Controller {

    /**
     * Standard 404
     *
     */
    public function four_oh_four() {
        $this->load->view('include/header');
        $this->load->view('errors/four_oh_four');
        $this->load->view('include/footer');
    }
}

