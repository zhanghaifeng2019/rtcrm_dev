<?php
class Auth extends CI_Controller {

        public function index()
        {
          if(isset($this->session->name)){
                redirect(base_url('Main'));
          }

          $this->load->library('form_validation');
          $this->form_validation->set_rules('email', 'パース','max_length[12]');
          $this->form_validation->set_rules('pass', 'パース','max_length[12]');

          if ($this->form_validation->run() == true) {
            
            $query = $this->db->get_where('staff', array('email' => $this->input->post('mail'),'password'=>  crypt($this->input->post('pass'),$this->input->post('mail'))));
            if(count($query->result())!=0){

                $session_data = array(
                  'name'      => $query->first_row('array')['name'],
                  'id' => $query->first_row('array')['id'],
                  'group' => $query->first_row('array')['group_id'],
                  'level' => $query->first_row('array')['status']
                );
                $this->session->set_userdata($session_data);
                redirect(base_url('Main'));
              }else{
                $this->load->view('common/head');
                $data['text'] = "正しいID及びPASSを入力してください";
                $this->load->view('Auth/Auth',$data);
                $this->load->view('common/footer');
              }
          } else {

              $this->load->view('common/head');
              $this->load->view('Auth/Auth');
              $this->load->view('common/footer');
          }
        }
        public function logout(){
          $_SESSION = array();
          redirect(base_url('Auth'));
        }
        public function emailCheck(){
          $this->load->model('Auth_model');
          $flag= $this->Auth_model->confirmEmail($_POST['emailCheck']);
          if($flag==1){

           $token=$this->Auth_model->tokenGen($_POST['emailCheck']);
            $this->Auth_model->insertTokenInfo($token,$_POST['emailCheck']);
            $this->email->from('no_reply@rtcrm.net', 'system');
            $this->email->to($_POST['emailCheck']);
            $this->email->subject('顧客管理システムパスワード再設定');
            $this->email->message(base_url().'Auth/createNewPass/'.$token);
           $this->email->send();

           $data['email']=$_POST['emailCheck'];

           $this->load->view('common/head');
           $this->load->view('Auth/sendEnd',$data);
           $this->load->view('common/footer');
          }
          else{
              $this->load->view('common/head');
              $this->load->view('Auth/wrongEmail');
              $this->load->view('common/footer');
          }

        }
        public function createNewPass($hash)
        {
          if(!isset($hash)){
                redirect(base_url('Auth'));
          }
          $this->load->model('Auth_model');
          $token=$this->Auth_model->confirmToken($hash);

          if($token==0){

            $this->load->view('common/head');
            $this->load->view('Auth/unAccess');
            $this->load->view('common/footer');
          }
          else{
            $data['info']=$this->Auth_model->getinfo($hash);

            $this->load->view('common/head');
            $this->load->view('Auth/createnewpassword',$data);
            $this->load->view('common/footer');
          }

        }
        public function updatePass()
        {
          $this->load->model('Auth_model');
          $email=$this->Auth_model->getEmail($_POST['staffId'])->email;
          $this->Auth_model->updatePass($_POST['password'],$_POST['staffId'],$email);

          $this->load->view('common/head');
          $this->load->view('Auth/clear');
          $this->load->view('common/footer');
        }


}
