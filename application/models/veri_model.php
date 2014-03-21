<?php if (!defined('BASEPATH')) die();

class Veri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Given a user's objectId, calculate points.
     *
     * @returns an array keyed by the event types
     * with the member's total points
     */
    public function getPoints($objectId) {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        if ($pp != NULL) {
            $this->db->select('_id, point_type');
            $this->db->where('points_period', $pp->_id);
            $events = $this->db->get('events');

            if ($events->num_rows() > 0) {
                $res = array(EVENT => 0, FUNDRAISING => 0, MEETING => 0, SOCIAL => 0);
                foreach ($events->result() as $e) {
                    $this->db->select('_id');
                    $this->db->where('event', $e->_id);
                    $this->db->where('status', APPROVED);
                    $this->db->where('requester', $objectId);
                    $ver = $this->db->get('verification_requests');
                    if ($ver->num_rows() > 0) {
                        $res[$e->point_type]++;
                    }
                }

                return $res;
                    
            } else {
                return array(EVENT => 0, FUNDRAISING => 0, MEETING => 0, SOCIAL => 0);
            }
        } else {
            return array(EVENT => '-', FUNDRAISING => '-', MEETING => '-', SOCIAL => '-');
        }
    }

    /**
     * Given a user's objectId, return their current
     * points requests.
     *
     * @returns an array of stdClass that has a field
     * for each column
     *      fields: _id, event, status, requester,
     *          created_at, updated_at
     */
    public function getRequests($objectId) {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        $res = array();

        if ($pp != NULL) {

            $this->db->select('_id, point_type');
            $this->db->where('points_period', $pp->_id);
            $events = $this->db->get('events');

            if ($events->num_rows() > 0) {

                foreach ($events->result() as $e) {

                    $this->db->select();
                    $this->db->where('event', $e->_id);
                    $this->db->where('requester', $objectId);
                    $this->db->limit(1);
                    $ver = $this->db->get('verification_requests');

                    if ($ver->num_rows() > 0) {
                        $verRes = $ver->result();
                        $verRes[0]->point_type = $e->point_type;
                        array_push($res, $verRes[0]);
                    }

                }
            }
        }
        return $res;
    }
}
