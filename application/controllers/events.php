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
        $events = $this->getEventsArray(constant('EVENT'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    public function fundraising() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => FUNDRAISING));
        $events = $this->getEventsArray(constant('FUNDRAISING'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    public function meeting() {
        $this->load->view('include/header'); 
        $this->load->view('events/sidebar', array('action' => MEETING));
        $events = $this->getEventsArray(constant('MEETING'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    public function social() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => SOCIAL));
        $events = $this->getEventsArray(constant('SOCIAL'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    //TODO check to make sure there are no open validation requests
    private function getEventsArray($eventId) {
        $this->load->model('Events_model', 'events');
        $this->load->model('UserCache', 'usercache');
        $query = $this->events->getEvents($eventId);
        $events = array();
        foreach ($query->result() as $req) {
            array_push($events, array('date' =>$req->eventDate, 'name' => $req->name,
                'creator' => $this->usercache->getName($req->creator)));
        }

        return $events;
    }
}
