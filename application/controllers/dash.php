<?php if (!defined('BASEPATH')) die();

/**
 * Controller that is responsible for the
 * user dashboard
 *
 * @author Sam
 */
class Dash extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //only render if user is logged in
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    /**
     * This is the announcements page that is rendered when the user
     * first logs in
     *
     */
    public function index() {
        $this->load->view('dash/header');
        $this->load->view('dash/sidebar', array('action' => -1));

        $this->load->model('PP_model', 'pp_model');

        $pp = $this->pp_model->getCurrentPointsPeriod();
        $ppEnd = new DateTime($pp->ends);
        $data['ppEnd'] = $ppEnd->getTimestamp() * 1000;
        
        $this->load->view('dash/index', $data);

        if ($this->session->userdata('permissionLevel') == MEMBER) {

            $this->load->model('PP_model', 'pp_model');
            $this->load->model('Veri_model', 'veri_model');

            $data = array();

            $data['points'] = $this->veri_model->getPoints($this->session->userdata('objectId'));

            $pp = $this->pp_model->getCurrentPointsPeriod();

            if ($pp != NULL) {
                $data['pp'] = array('event' => $pp->event_points,
                    'fun' => $pp->fundraising_points,
                    'meeting' => $pp->meeting_points,
                    'social' => $pp->social_points);
            } else {
                $data['pp'] = array('event' => '-',
                    'fun' => '-',
                    'meeting' => '-',
                    'social' => '-');
            }

            $this->load->view('dash/point_reqs', $data);
        } 

        $this->load->view('dash/footer');
    }

    /**
     * Shows open points requests for the current
     * points period
     *
     */
    public function point_requests() {
        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 1));

        //gets all requests at once, takes advantage of caching dbs
        //to make the queries more effiecient
        //will later move to mysql and create my own api
        $this->load->model('Veri_model', 'veri_model');
        $this->load->model('Events_model', 'events_model');

        //current requests in stdClass object
        $requests = $this->veri_model->getRequests($this->session->userdata('objectId'));

        $pending = array();
        $approved = array();
        $rejected = array();
        foreach ($requests as $req) {
            $entry = 
                array('event' => $this->events_model->getEventName($req->event), 
                'type' => $this->events_model->eventTypeString($req->point_type), 
                'dateSubmitted' => $req->created_at);

            switch($req->status) {
                case PENDING:
                    //Since it hasn't been approved, we don't want to
                    //use the updated_at field as a decision data
                    $entry['dateOfDecision'] = 'N/A';
                    array_push($pending, $entry);
                    break;
                case APPROVED:
                    $entry['dateOfDecision'] = $req->updated_at;
                    array_push($approved, $entry);
                    break;
                case REJECTED:
                    $entry['dateOfDecision'] = $req->updated_at;
                    array_push($rejected, $entry);
                    break;
            }
        }

        $this->load->view('dash/point_requests', array('pending' => $pending,
            'approved' => $approved, 'rejected' => $rejected));
        $this->load->view('include/footer');
    }

    /**
     * May or may not include this feature...
     *
     */
    public function messages() {
        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 2));
        $this->load->view('include/footer');
    }

    /**
     * Alters user's data. User will need to re-enter auth
     * data
     *
     */
    public function settings() {
        $this->load->view('include/header');
        $this->load->view('dash/sidebar', array('action' => 3));
        $this->load->view('include/footer');
    }

}
