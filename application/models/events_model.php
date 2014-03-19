<?php if (!defined('BASEPATH')) die();

class Events_model extends CI_Model {

    var $name;
    var $eventDate;
    var $creator;

    public function __construct() {
        parent::__construct();
    }

    public function countEvents($pointType) {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        $res = 0;

        if ($pp != NULL) {
            $this->db->like('points_period', $id);
            $this->db->like('point_type', $pointType);
            $this->db->from('events');
            $res = $this->db->count_all_results();
        }

        return $res;
    }

    public function getEvents($pointType, $limit, $start) {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        $events = array();

        if ($pp != NULL) {
            $this->db->limit($limit, $start);
            $this->db->select('name, eventDate, creator');
            $this->db->where('points_period', $pp->id);
            $this->db->where('point_type', $pointType);
            $query = $this->db->get('events');

            $this->load->model('UserCache', 'usercache');

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $req) {
                    array_push($events, array('date' =>$req->eventDate, 'name' => $req->name,
                        'creator' => $this->usercache->getName($req->creator)));
                }
            }
        }

        return $events;
    }
}

