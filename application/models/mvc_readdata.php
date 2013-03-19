class Mvc_readdata extends CI_Model {

    function __construct()
    {
        $this->load->model('Mvc_readdata');

        $data['query'] = $this->Mvc_readdata->get_last_ten_entries();

        $this->load->view('blog', $data);
        
        $this->load->model('Mvc_readdata', '', TRUE);
    }
}