<?php if (!defined('BASEPATH')) die();

class Events_model extends CI_Model {

    var $name;
    var $eventDate;
    var $creator;

    public function __construct() {
        parent::__construct();
    }

    public function getEvents($pointType) {
        $id = intval($this->db->query('select _id from points_periods where active=1')->row()->_id);
        $query = $this->db->query('select name, eventDate, creator from events where points_period=? and point_type=?', array($id, $pointType));
        return $query;
    }
}

