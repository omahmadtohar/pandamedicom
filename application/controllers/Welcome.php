<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('menu/header');
		$this->load->view('menu/sidebar');
		$this->load->view('welcome_message');
		$this->load->view('menu/footer');
	}
}
