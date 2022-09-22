<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function coba($password)
	{
		$p = password_hash($password, PASSWORD_DEFAULT);
		echo $p;


		// $data = $this->m_user->getDashboard_api($password);
		// $hadir = 0;
		// $alpha = 0;
		// $izin = 0;
		// foreach ($data->result_array() as $items) {
		// 	// if ($items['type'] === 'hadir') {
		// 	// 	$hadir++;
		// 	// } else if ($items['type'] === 'izin') {
		// 	// 	$izin++;
		// 	// } else if ($items['type'] === 'alpha') {
		// 	// 	$alpha++;
		// 	// }
		// 	var_dump($items);
		// }
		// echo $hadir, $izin, $alpha;

		// echo date('D');
	}
}
