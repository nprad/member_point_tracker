<?php if (!defined('BASEPATH')) die();

class Veri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPoints() {
        $this->load->model('PP_model', 'pp_model');
        $pp = $this->pp_model->getCurrentPointsPeriod();

        if ($pp != NULL) {
            //figure out a smart way to get the points
        } 
    }
}
