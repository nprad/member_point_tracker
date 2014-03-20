<?php if (!defined('BASEPATH')) die();

class Veri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPoints() {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        if ($pp != NULL) {
            $this->db->select('_id, point_type');
            $this->db->where('points_period', $pp[0]->_id);
            $events = $this->db->get('events');

            if ($events->num_rows() > 0) {
                $res = array(0 => 0, 1 => 0, 2 => 0, 3 => 0);
                foreach ($events->result() as $e) {
                    $this->db->select('_id');
                    $this->db->where('event', $e->_id);
                    $ver = $this->db->get('verification_requests');
                    //TODO get only approved points
                    if ($ver->num_rows() > 0) {
                        $res[$e->_id]++;
                    }
                }

                return $res;
                    
            } else {
                return array(0 => 0, 1 => 0, 2 => 0, 3 => 0);
            }
        } else {
            return array(0 => '-', 1 => '-', 2 => '-', 3 => '-');
        }
    }
}
