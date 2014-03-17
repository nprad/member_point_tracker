<?php if (!defined('BASEPATH')) die();

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('events/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => -1));
        $this->load->view('events/index');
        $this->load->view('events/footer');
    }

    public function event() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => EVENT));
        $events = $this->getEventsArray(constant('EVENT'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    public function fundraising() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => FUNDRAISING));
        $events = $this->getEventsArray(constant('FUNDRAISING'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    public function meeting() {
        $this->load->view('include/header', array('validSession' => TRUE)); 
        $this->load->view('events/sidebar', array('action' => MEETING));
        $events = $this->getEventsArray(constant('MEETING'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    public function social() {
        $this->load->view('include/header', array('validSession' => TRUE));
        $this->load->view('events/sidebar', array('action' => SOCIAL));
        $events = $this->getEventsArray(constant('SOCIAL'));
        $this->load->view('events/table.php', array('events' => $events));
        $this->load->view('include/footer');
    }

    private function getEventsArray($eventId) {
        $this->load->library('parse');
        $pq = $this->parse->ParseQuery('Events');
        $pq->where('pointType', $eventId);
        $requests = $pq->find();

        $this->load->model('UserCache', 'usercache');
        $events = array();
        foreach ($requests->results as $req) {
            array_push($events, array('date' =>$req->eventDate->iso, 'name' => $req->name,
                'creator' => $this->usercache->getName($req->createdBy->objectId)));
        }

        return $events;
    }
}
