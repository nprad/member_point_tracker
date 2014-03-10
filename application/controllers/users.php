<?php if (!defined('BASEPATH')) die();

class Users extends CI_Controller {

    public function index() {
        if (!$this->session->userdata('loggedIn')) {
            $this->load->helper('form');
            $this->load->view('include/header', array('validSession' => FALSE));
            $this->load->view('frontpage');
            $this->load->view('include/footer');
        } else {
            redirect('requirements');
        }

    }

    public function login() {
        if (!$this->session->userdata('loggedIn')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $authFailed = FALSE;

            $this->session->keep_flashdata('login_error');

            if (!empty($username) && !empty($password)) {

                $this->load->library('parse');
                $user = $this->parse->ParseUser();

                try {
                    $request = $user->login($username, $password);
                } catch (Exception $e) {
                    $authFailed = TRUE;
                    $this->session->set_flashdata('login_error', 'Incorrect username or password');
                }

            } else {
                $authFailed = TRUE;
                $this->session->set_flashdata('login_error', 'Incorrect username or password');
            }

            if (!$authFailed) {
                $this->session->set_flashdata('login_error', '');
                $this->session->set_userdata('loggedIn', TRUE);
                $this->session->set_userdata('permissionLevel', $request->permissionLevel);
                $this->session->set_userdata('objectId', $request->objectId);
                redirect('');
            } else {
                //for whatever reason the flash data only shows up when
                //the login fails, not when it is brought up by another
                //controller. hmm...
                $this->load->helper('form');
                $this->load->view('include/header-nologin');
                $this->load->view('templates/login.php');
                $this->load->view('include/footer');
            }
        } else {
            redirect('');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('');
    }
}
