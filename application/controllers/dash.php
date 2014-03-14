<?php if (!defined('BASEPATH')) die();

class Dash extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    public function index() {
        redirect('dash/requirements');
    }

    public function requirements() {
        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 0));
        $this->load->view('dash/point_reqs');
        $this->load->view('include/footer');
    }

    public function point_requests() {
        $this->load->library('parse');

        //gets all requests at once, takes advantage of caching dbs
        //to make the queries more effiecient
        $pq = $this->parse->ParseQuery('VerificationRequests');
        $pq->wherePointer('user', '_User', $this->session->userdata('objectId'));
        $requests = $pq->find();

        $this->load->model('EventsCache', 'eventscache');
        $pending = array();
        $approved = array();
        $rejected = array();
        foreach ($requests->results as $req) {
            $entry = array('event' => $this->eventscache->getName($req->event->objectId),
               'type' => $req->pointType, 'dateSubmitted' => $req->createdAt);

            switch($req->status) {
                case PENDING:
                    $entry['dateOfDecision'] = 'N/A';
                    array_push($pending, $entry);
                    break;
                case APPROVED:
                    $entry['dateOfDecision'] = $req->updatedAt;
                    array_push($approved, $entry);
                    break;
                case REJECTED:
                    $entry['dateOfDecision'] = $req->updatedAt;
                    array_push($rejected, $entry);
                    break;
            }
        }

        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 1));
        $this->load->view('dash/point_requests', array('pending' => $pending,
            'approved' => $approved, 'rejected' => $rejected));
        $this->load->view('include/footer');
    }

    public function messages() {
        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 2));
        $this->load->view('include/footer');
    }

    public function settings() {
        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 3));
        $this->load->view('include/footer');
    }

}
