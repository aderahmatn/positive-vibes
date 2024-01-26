<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_admin_not_login();
		$this->load->helper(['auth']);
	}

	public function index()
	{
		$this->template->load('shared/index', 'dashboard/index');
	}
	public function katalog()
	{
		$this->template->load('shared/store', 'welcome_message');
	}
}
