<?php
class log_model extends CI_Model {


    public function loger()
        {
                $data = array(
                        'staff_id' => $this->session->id,
                        'name' =>$this->session->name,
                        'ip'=>$_SERVER['REMOTE_ADDR'],
                        'useragent' => $_SERVER['HTTP_USER_AGENT'],
                        'url' =>(empty($_SERVER['HTTPS']) ? "http://" : "https://").$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
                        'referer' => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] :"",
                        'post_data' =>  isset($_POST) ? json_encode($_POST) :"",
                        'session_data' =>  isset($_SESSION) ? json_encode($_SESSION) :"",
                        'cookie_data' =>  isset($_COOKIE) ? json_encode($_COOKIE) :"",
                        'created' => date("Y-m-d H:i:s")
                );
                   $this->db->insert('stafflog', $data);
        }

}

?>
