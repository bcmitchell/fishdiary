<?php

class Blog extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');  
    }
    public function index()
    {
        $data['item'] = $this->Item_model->getLatestItems();
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function details()
    {
        $data['details'] = $this->Item_model->get_item_detail();
        $data->load->view('details', $data);
    }
}
?>