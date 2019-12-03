<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlassesModel extends MY_Model
{
	public function __construct()
	{
        //table name
		parent::__construct('Glasses');
	}
}
