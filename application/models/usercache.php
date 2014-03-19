<?php if (!defined('BASEPATH')) die();

class UserCache extends CI_Model {

    var $objectId = '';
    var $name = '';

    public function __construct() {
        parent::__construct();
    }

    public function getName($objectId) {
        $this->objectId = $objectId;
        $query = $this->db->query('select name from usercache where objectId=?', array($objectId));

        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            $this->load->library('parse');
            $pq = $this->parse->ParseQuery('_User');
            $pq->where('objectId', $objectId);
            $result = $pq->find();
            $this->name = $result->results[0]->firstName . ' ' . $result->results[0]->lastName;
            $this->db->insert('usercache', $this);
            return $this->name;
        }
    }

    public function updateName($objectId, $name) {
        $this->objectId = $objectId;
        $this->name = $name;
        $this->db->update('usercache', $this, array('id' => $objectId));
    }
}
