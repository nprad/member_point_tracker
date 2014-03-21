<?php if (!defined('BASEPATH')) die();

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => -1));
        $this->load->view('include/footer');
    }

    public function event() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => EVENT));
        $this->eventTable('event', EVENT);
        $this->load->view('include/footer');
    }

    public function fundraising() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => FUNDRAISING));
        $this->eventTable('fundraising', FUNDRAISING);
        $this->load->view('include/footer');
    }

    public function meeting() {
        $this->load->view('include/header'); 
        $this->load->view('events/sidebar', array('action' => MEETING));
        $this->eventTable('meeting', MEETING);
        $this->load->view('include/footer');
    }

    public function social() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => SOCIAL));
        $this->eventTable('social', SOCIAL);
        $this->load->view('include/footer');
    }

    public function create() {
        if ($this->session->userdata('permissionLevel') > MEMBER) {
            $this->load->helper('form');
            $this->load->view('include/header');
            $this->load->view('events/sidebar', array('action' => 4));
            $this->load->view('events/create');
            $this->load->view('include/footer');
            
        } else {
            redirect('errors/four_oh_four');
        }
    }

    private function eventTable($methodName, $pointType) {
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->model('Events_model', 'events');
        $config = array();
        $config['base_url'] = base_url() . INDEX . 'events/' . $methodName;
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->events->countEvents($pointType);
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';

        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['events'] = $this->events->getEvents($pointType, 
            $config['per_page'], $page);
        

        $data['links'] = $this->pagination->create_links();
        $this->load->view('events/table.php', $data);
    }
}
