<?php
class TMDetail extends CI_Controller {
  public function __construct()
  {
       parent::__construct();
       if(!isset($this->session->name)){
                 header( 'HTTP/1.1 301 Moved Permanently' );
                 header( 'Location: '."https://rtcrm.net/Auth/logout" );
               }
               $this->load->model('log_model');
               $this->log_model->loger();
  }

        public function index()
        {

          if(isset($_POST['pagiNum'])){
          $this->session->set_userdata('pagiNum', $_POST['pagiNum']);
          }

          if(!isset($_POST['id'])){
          $_POST['id']=$this->session->POST;
          }
          else{
              $this->session->set_userdata('POST', $_POST['id']);
          }

          $this->load->model('Dash_model');
          $data['genre']= $this->Dash_model->getGenre();
          $data['agency']= $this->Dash_model->getAgency();
          $data['staff']= $this->Dash_model->getStaff();
          $data['group']= $this->Dash_model->getGroup();
          $data['status']=$this->Dash_model->getStatus();
          $data['StatusComment']=$this->Dash_model->getStatusComment();
          $data['ContactLastest']=$this->Dash_model->getContactsLatest();
          $data['Contacts']= $this->Dash_model->getContacts();
          $data['initDash']= $this->Dash_model->initDash();


          $data['customertype']= $this->Dash_model->customertype();
          $this->load->view('common/head');
          $this->load->view('TMDetail/index',$data);
          $this->load->view('common/footer');

        }
        public function update()
        {

          if(isset($_POST['pagiNum'])){
          $this->session->set_userdata('pagiNum', $_POST['pagiNum']);
          }

          $this->load->model('Dash_model');
          $this->Dash_model->update();

          $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
                 header("HTTP/1.1 307 Temporary move");
                 Header("Location:".base_url('TMDetail'));
        }

        public function contact(){

          $this->load->model('Dash_model');
          $this->Dash_model->insertContact();
          $data['initDash']= $this->Dash_model->initDash();
          $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
                 header("HTTP/1.1 307 Temporary move");
                 Header("Location:".base_url('TMDetail'));
        }

        public function DetailContact(){

          $this->load->model('Dash_model');
          $this->Dash_model->insertContact();
          $data['initDash']= $this->Dash_model->initDash();
          $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
                 header("HTTP/1.1 307 Temporary move");
                 Header("Location:".base_url('TMDetail/contactDetail'));
        }

        public function contactDetail(){

          $this->load->model('Dash_model');
          $param = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

          $config=array();
          $config['base_url'] =base_url()."/TMDetail/contactDetail";
          $config['per_page']=10;

          $data['totalRows']=count($this->Dash_model->getAllContacts());

          $config['total_rows']=$data['totalRows'];
          $config["num_links"] = 2;

          $data['AllContacts']= $this->Dash_model->getAllContactsList($config["per_page"],$param);

          $config['first_tag_open']='<li class="prv-all">';
          $config['first_tag_close'] = '</li>';

          $config['prev_tag_open']='<li class="prv">';
          $config['prev_tag_close'] = '</li>';

          $config['prev_link']='<li class="prv">';
          $config['prev_link'] = '</li>';

          $config['num_tag_open'] = '<li >';
          $config['num_tag_close'] ='</li>';

          $config['cur_tag_open'] = '<li class="current"><span>';
          $config['cur_tag_close'] = '</span></li >';

          $config['next_tag_open'] ='<li class="nxt">';
          $config['next_tag_close'] ='</li>';

          $config['last_tag_open'] ='<li class="nxt-all">';
          $config['last_tag_close'] ='</li>';
          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();

          $data['initDash']= $this->Dash_model->initDash();
          $data['staff']= $this->Dash_model->getStaff();
          $this->load->view('common/head');

          $this->load->view('TMDetail/contactsDetail',$data);
          $this->load->view('common/footer');
        }




}
