<?php if (!defined('BASEPATH')) die();

class PP_model extends CI_Model {

    public function __construct() {
        parent::__construct();
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
