<?php if (!defined('BASEPATH')) die();

class Events_model extends CI_Model {

    var $name;
    var $eventDate;
    var $creator;

    public function __construct() {
        parent::__construct();
    }

    public function countEvents($pointType) {
        $id = intval($this->db->query('select _id from points_periods where active=1')->row()->_id);

        $this->db->like('points_period', $id);
        $this->db->like('point_type', $pointType);
        $this->db->from('events');
        return $this->db->count_all_results();
    }

    public function getEvents($pointType, $limit, $start) {
        $id = intval($this->db->query('select _id from points_periods where active=1')->row()->_id);
        $this->db->limit($limit, $start);
        $this->db->select('name, eventDate, creator');
        $this->db->where('points_period', $id);
        $this->db->where('point_type', $pointType);
        $query = $this->db->get('events');

        $this->load->model('UserCache', 'usercache');
        $events = array();
        foreach ($query->result() as $req) {
            array_push($events, array('date' =>$req->eventDate, 'name' => $req->name,
                'creator' => $this->usercache->getName($req->creator)));
        }

        return $events;
    }
}

