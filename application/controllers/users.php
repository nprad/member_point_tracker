<?php if (!defined('BASEPATH')) die();

class Users extends CI_Controller {

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $authFailed = FALSE;

        if (!empty($username) && !empty($password)) {

            $this->load->library('parse');
            $user = $this->parse->ParseUser();

            try {
                $request = $user->login($username, $password);
            } catch (Exception $e) {
                $authFailed = TRUE;
            }

        } else {
            $authFailed = TRUE;
        }

        if (!$authFailed) {
            $data['request'] = $request;
            $this->load->view('users', $data);
//            $this->session->set_userdata($dataArr);
        } else {
            $data['message'] = 'Incorrect username or password';
            $this->load->helper('form');
            $this->load->view('include/header-nologin');
            $this->load->view('templates/login.php', $data);
            $this->load->view('include/footer');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
    }
}
