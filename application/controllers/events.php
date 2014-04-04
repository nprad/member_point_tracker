<?php if (!defined('BASEPATH')) die();

/**
 * Controller responsible for serving up events
 * in their respective categories.
 *
 * @author Sam
 */
class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //user must be logged in to access this controller
        if (!$this->session->userdata('loggedIn')) {
            redirect('login');
        }
    }

    /**
     * Right now this just renders a blank page with
     * no event type selected. Need content for this page.
     *
     */
    public function index() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => -1));
        $this->load->view('include/footer');
    }

    /**
     * Events
     *
     */
    public function event() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => EVENT));
        $this->eventTable('event', EVENT);
        $this->load->view('include/footer');
    }

    /**
     * Events
     *
     */
    public function fundraising() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => FUNDRAISING));
        $this->eventTable('fundraising', FUNDRAISING);
        $this->load->view('include/footer');
    }

    /**
     * Events
     *
     */
    public function meeting() {
        $this->load->view('include/header'); 
        $this->load->view('events/sidebar', array('action' => MEETING));
        $this->eventTable('meeting', MEETING);
        $this->load->view('include/footer');
    }

    /**
     * Events
     *
     */
    public function social() {
        $this->load->view('include/header');
        $this->load->view('events/sidebar', array('action' => SOCIAL));
        $this->eventTable('social', SOCIAL);
        $this->load->view('include/footer');
    }

    /**
     * Creates an event. Right now it will be a php form
     * but may move to javascript.
     *
     */
    public function create() {
        //This is restricted to users with permission level
        //higher than member
        if ($this->session->userdata('permissionLevel') > MEMBER) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('eventName', 'event name', 'trim|required');
            $this->form_validation->set_rules('pointType', 'point type', 'required');
            $this->form_validation->set_rules('pointsPeriod', 'points period', 'required');
            $this->form_validation->set_rules('eventDate', 'event date', 'callback_date_check');
            $this->form_validation->set_rules('eventTime', 'event time', 'callback_time_check');

            $data['valid'] = false;

            if (!$this->form_validation->run()) {

                $this->load->helper('form');

                $this->load->view('include/header');
                $this->load->view('events/sidebar', array('action' => 4));

                $this->load->model('PP_model', 'pp_model');
                $data['pps'] = $this->pp_model->getAllPointsPeriodsForDropdown();
                $this->load->view('events/create', $data);
                $this->load->view('include/footer');

            } else {

                $pointsPeriod = $this->input->post('pointsPeriod');
                $eventName = $this->input->post('eventName');
                $pointType = $this->input->post('pointType');
                $creator = $this->session->userdata('objectId');

                //time params
                $hours = $this->input->post('eventTimeHours');
                $min = $this->input->post('eventTimeMinutes');
                $ampm = $this->input->post('eventTimeAMPM');
                if ($ampm == 'PM')
                    $hours = ($hours + 12) % 24;

                //date params
                $month = $this->input->post('eventDateMonth');
                $day = $this->input->post('eventDateDay');

                $this->load->model('Events_model', 'events_model');
                $this->events_model->createEvent($eventName, $pointType, $pointsPeriod, $creator, date("Y") . '-' . $month . '-' . $day . ' ' . $hours . ':' . $min . ':00');

                $data['valid'] = true;

                $this->load->helper('form');

                $this->load->view('include/header');
                $this->load->view('events/sidebar', array('action' => 4));

                $this->load->model('PP_model', 'pp_model');
                $data['pps'] = $this->pp_model->getAllPointsPeriodsForDropdown();
                $this->load->view('events/create', $data);
                $this->load->view('include/footer');
            }
            
        } else {
            redirect('errors/four_oh_four');
        }
    }

    /**
     * Renders the table with pagination (yay!)
     * with all the events in the current points period
     * for a given category
     *
     */
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

    /**
     * Callback that makes sure that the date field
     * is set. Unfortunately, I had to hardcode each
     * of the fields.
     *
     */
    public function date_check($str) {
        $month = $this->input->post('eventDateMonth');
        $day = $this->input->post('eventDateDay');

        if (empty($month) || empty($day)) {
            $this->form_validation->set_message('date_check', 'The %s field is required');
            return false;
        }

        return true;
    }

    /**
     * Callback that makes sure that the time field
     * is set. Unfortunately, I had to hardcode each
     * of the fields.
     *
     */
    public function time_check($str) {
        $hours = $this->input->post('eventTimeHours');
        $min = $this->input->post('eventTimeMinutes');
        $ampm = $this->input->post('eventTimeAMPM');

        if (empty($hours) || empty($min) || empty($ampm)) {
            $this->form_validation->set_message('time_check', 'The %s field is required');
            return false;
        }

        return true;
    }
}
