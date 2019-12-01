<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsitePreferences extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Preference', 'Preferences');
	}

	public function get()
	{
		$data = $this->Preferences->select();
		$this->status(200)->json($data);
	}

	public function getSingle(string $key)
	{
		$data = $this->Preferences->selectOne($key);
		$this->status(200)->json($data);
	}

	public function patch(string $key)
	{
		$body = $this->getRequestBody();

		$data = $this->Preferences->update($key, array(
			$body['Field'] => $body['Value']
		), 'Key');
		$this->status(200)->json($data);
	}
}
