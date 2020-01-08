<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Agency extends CI_Controller{
        public function __construct(){
            parent::__construct();
            if(!isset($this->session->name)){
                header( 'HTTP/1.1 301 Moved Permanently' );
                header( 'Location: '."https://rtcrm.net/Auth/logout" );
            }
            $this->load->model('Log_model');
            $this->Log_model->loger();
        }

        function index(){
            //会社のすべてのスタッフの情報がこのsessionの中にある。
            //一番目は自分の情報で、export_arrayは他のスタッフの情報、使わないため、unset。
            unset($_SESSION["export_array"]);
            $this->load->view('common/head');
            $this->load->view('agency/agency_index');
            $this->load->view('common/footer');

        }

        function registration(){
            unset($_SESSION["export_array"]);
            $this->load->view('common/head');
            $this->load->view('agency/registration');
            $this->load->view('common/footer');
        }

        function insert(){
            $this->load->model("agency_model");
            $now_time=date("Y-m-d H:i:s");
            $data=array(
                "agency_name" =>$this->input->post("agency_name"),
                "person_in_charge" =>$this->input->post("person_in_charge"),
                "tel" =>$this->input->post("tel"),
                "email" =>$this->input->post("email"),
                "zip" =>$this->input->post("zip"),
                "address" =>$this->input->post("address"),
                "created"=>$now_time,
                "modified"=>$now_time
            );

            if($this->input->post("insert")){
                $this->agency_model->insert_data($data);
                redirect(base_url()."Agency/list");  
            }
        }
        
        function list(){
            $this->load->model("agency_model");

            //不是取出全部数据，而是仅仅取出10条数据。所以不能写这句话
            // $data["fetch_data"]=$this->agency_model->fetch_data(); 

            //$this->load->library("pagination"); autoload.php如果加载了这个包就不用写这句话
            $config['base_url'] =base_url()."/Agency/list";

            //有多少条记录一定要传给total_rows
            $config["total_rows"]=$this->agency_model->fetch_data()->num_rows();

            //建立基准点.或者说是偏差点
            //https://rtcrm.net/dev/Agency/list/10     $offset=10  
            //https://rtcrm.net/dev/Agency/list/       $offset=0
            $offset=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $per_page_records=10;
            //从agencyinfo表中取出10条数据放进$data，从零开始
            $data["records"]=$this->agency_model->fetch_ten_records($per_page_records,$offset);

            //一些用来显示分页相关定义。不需要记住。
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

            $this->load->view('common/head');
            $this->load->view("agency/agency_list",$data);
            $this->load->view('common/footer');
        }

        function show_data(){
            $user_id=$this->uri->segment(3);
            $this->load->model("agency_model");
            $data["agency_data"]=$this->agency_model->fetch_single_data($user_id);
            $this->load->view('common/head');
            $this->load->view("agency/agency_edit",$data);
            $this->load->view('common/footer');
        }

        function update(){
            $this->load->model("agency_model");
            $now_time=date("Y-m-d H:i:s");
            $data=array(
                "agency_name" =>$this->input->post("agency_name"),
                "person_in_charge" =>$this->input->post("person_in_charge"),
                "tel" =>$this->input->post("tel"),
                "email" =>$this->input->post("email"),
                "zip" =>$this->input->post("zip"),
                "address" =>$this->input->post("address"),
                "created"=>$this->input->post("created_time"),
                "modified"=>$now_time
            );
            if($this->input->post("update")){
                $this->agency_model->update_data($data,$this->input->post("hidden_id"));
                redirect(base_url()."Agency/list");  //代理店一覧に戻る
            }   
        }
        
    }
?>