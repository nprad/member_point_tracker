<?php if (!defined('BASEPATH')) die();

class PP_model extends CI_Model {

    var $id;
    var $name;
    var $starts;
    var $ends;
    var $eventsPoints;
    var $funPoints;
    var $meetingPoints;
    var $socialPoints;

    public function __construct() {
        parent::__construct();
    }

    public function getCurrentPointsPeriod() {
        $query = $this->db->query('select * from points_periods where active=1 limit 1');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
}
