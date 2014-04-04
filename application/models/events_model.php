<?php if (!defined('BASEPATH')) die();

class Events_model extends CI_Model {

    var $name;
    var $eventDate;
    var $creator;

    public function __construct() {
        parent::__construct();
    }

    /**
     * A simple method that returns the string
     * equivalent of the eventType
     */
    public function eventTypeString($eventType) {
        switch ($eventType) {
            case EVENT:
                return 'Event';
            case FUNDRAISING:
                return 'Fundraising';
            case MEETING:
                return 'Meeting';
            case SOCIAL:
                return 'Social';
            default:
                return 'Unregistered event type';
        }
    }

    /**
     * Counts the number of events with type $pointType
     * within the current points period. Used for pagination
     *
     * @returns an integer number for the number of events
     */
    public function countEvents($pointType) {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        $res = 0;

        if ($pp != NULL) {
            $this->db->where('points_period', $pp->_id);
            $this->db->where('point_type', $pointType);
            $this->db->from('events');
            $res = $this->db->count_all_results();
        }

        return $res;
    }

    /**
     * Gets the events in the current points period for a 
     * given point type.
     *
     * @returns an array with fields for each event
     *      fields: id, date, name, creator
     */
    public function getEvents($pointType, $limit, $start) {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        $events = array();

        if ($pp != NULL) {
            $this->db->limit($limit, $start);
            $this->db->select('_id, name, eventDate, creator');
            $this->db->where('points_period', $pp->_id);
            $this->db->where('point_type', $pointType);
            $query = $this->db->get('events');

            $this->load->model('UserCache', 'usercache');

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $req) {
                    array_push($events, array('id' => $req->_id, 'date' =>$req->eventDate, 'name' => $req->name,
                        'creator' => $this->usercache->getName($req->creator)));
                }
            }
        }

        return $events;
    }

    /**
     * Method that finds a name given an eventId
     *
     * @returns string value for name
     */
    public function getEventName($eventId) {
        $this->db->limit(1);
        $this->db->select('name');
        $this->db->where('_id', $eventId);
        $query = $this->db->get('events');

        if ($query->num_rows() > 0) {
            $res = $query->result();
            return $res[0]->name;
        } else {
            return '';
        }
    }

    public function createEvent($eventName, $pointType, 
            $pointsPeriod, $creator, $eventDate) {

        $values = array('name' => $eventName, 'point_type' => $pointType,
            'points_period' => $pointsPeriod, 'creator' => $creator,
            'eventDate' => $eventDate);

        $this->db->insert('events', $values);
    }
}

