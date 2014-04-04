<?php if (!defined('BASEPATH')) die();

class PP_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllPointsPeriods() {
        $query = $this->db->get('points_periods');


        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function getAllPointsPeriodsForDropdown() {
        $this->db->select('_id, name');
        $this->db->order_by('active desc, starts asc');
        $query = $this->db->get('points_periods');

        $res = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $pp) {
                $res[$pp->_id] = $pp->name;
            }
        } else {
            $res[''] = 'No points periods!';
        }

        return $res;
    }

    /**
     * Gets the record corresponding to the current points period
     *
     * 
     */
    public function getCurrentPointsPeriod() {
        $this->db->where('active', 1);
        $this->db->limit(1);
        $query = $this->db->get('points_periods');

        if ($query->num_rows() > 0) {
            $res = $query->result();
            return $res[0];
        } else {
            return NULL;
        }
    }

}
