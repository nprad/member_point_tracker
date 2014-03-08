<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

   public function index()
	{
      $this->load->library('parse');
      $user = $this->parse->ParseUser();
      $user->signup("st029", "bar", "sam.thompson028@gmail.com");
      $this->load->view('include/header');
      $this->load->view('frontpage');
      $this->load->view('include/footer');
	}
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
