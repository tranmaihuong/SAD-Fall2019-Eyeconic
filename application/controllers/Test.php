<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('TestM', 'test');
	}

	public function post()
	{
		$body = $this->getRequestBody();
		$data = $this->test->insert($body);

		$this->status(201)->json($data);
	}

	public function delete($id)
	{
		$data = $this->test->delete($id, 'Id');
		$this->status(200)->json($data);
	}
}
