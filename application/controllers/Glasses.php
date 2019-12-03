<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Glasses extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('GlassesModel', 'glasses323234');
    }

    public function index()
    {
        $data['ttt'] = $this->glasses323234->select();
        // run view
        $this->load->view('Glasses_View',$data);
        // use route

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
