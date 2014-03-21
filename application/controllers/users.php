<?php if (!defined('BASEPATH')) die();

/**
 * Controls login and logout operations
 *
 * @author Sam
 */
class Users extends CI_Controller {

    /**
     * When navigating to users, redirect to dash
     * login will be brought up automatically if not
     * logged in
     *
     */
    public function index() {
        redirect('dash/requirements');
    }

    /**
     * Handles authentication via posts. Redirects to dash
     * on success and login on fail.
     *
     */
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
                $this->session->set_userdata('name', $request->firstName . ' ' . $request->lastName);
                redirect('dash');
            } else {
                $this->load->helper('form');
                $this->load->view('include/header-nologin');
                $this->load->view('templates/login.php');
                $this->load->view('include/footer');
            }
        } else {
            redirect('');
        }
    }

    /**
     * Destroys session and redirects to login screen
     *
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect('');
    }
}
