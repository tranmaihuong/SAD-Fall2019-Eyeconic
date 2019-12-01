<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preference extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Preferences', 'Key');
	}
}
