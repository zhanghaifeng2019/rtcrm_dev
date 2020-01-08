<?php
class Set extends CI_Controller {

  public function __construct()
     {
         parent::__construct();
         $this->load->helper('form');
         $this->load->helper('url');
         $this->load->database();
         $this->load->model('log_model');
         $this->log_model->loger();
     }

        public function index()
        {
          $this->output->enable_profiler(false);


          $this->load->library('form_validation');


          $this->form_validation->set_rules('mail', 'メール' );
          $this->form_validation->set_rules('pass', 'パース','max_length[12]|numeric');

          if ($this->form_validation->run() == true) {
              // $this->load->model('Test_model');
              // $data['table']= $this->Test_model->getr();
              // $this->load->view('common/head');
              // $this->load->view('TMSerch/result',$data);
              // $this->load->view('common/footer');

              $data = array('name' => "name", 'email' => $this->input->post('mail'), 'password' => crypt($this->input->post('pass'),$this->input->post('mail'))
              ,"status" => 1 , "group_id"=>1,"is_delete"=>0,"created"=>date("Y-m-d"),"modified"=>date("Y-m-d")
            );
            $str = $this->db->insert_string('staff', $data);

            $this->db->query($str);


          } else {
              $this->load->view('common/head');
              $this->load->view('Set');
              $this->load->view('common/footer');
          }

        }
}
