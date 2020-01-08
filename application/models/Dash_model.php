<?php
class Dash_model extends CI_Model {

   public function initDash(){
     $result = $this->db->query("SELECT CL.*,SI.*, ST.name staffName ,ST.id staffId,ST.group_id staffGroup FROM customerlist CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id WHERE CL.cid =".$this->session->POST.' and CL.is_delete = 0')->result();
     $this->db->close();
     return $result;
   }
   

   public function getContacts(){
     $result = $this->db->query("SELECT *,CC.created contactDate FROM customercontact CC, staff ST where CC.staff_id=ST.id and CC.cid =".$_POST['id'].' and CC.is_delete = 0 order by CC.created desc limit 3')->result();
     $this->db->close();
     return $result;
   }

   public function getAllContacts(){
     $result = $this->db->query("SELECT * FROM customercontact CC, staff ST where CC.staff_id=ST.id and CC.cid =".$this->session->POST.' and CC.is_delete = 0 order by CC.created desc')->result();
     $this->db->close();

     return $result;
   }

   public function getAllContactsList($limit,$start){
     $result = $this->db->query("SELECT * FROM customercontact CC, staff ST where CC.staff_id=ST.id and CC.cid =".$this->session->POST.' and CC.is_delete = 0 order by CC.created desc LIMIT '.$start.','.$limit)->result();
     $this->db->close();


     return $result;
   }




   public function insertContact(){
$timer;
     if ($_POST['timer2']=='連絡予定なし') {
       $timer=-1;
     }
     else{
       $timer=$_POST['timer2'];
     }

     $timer_date=null;
     if($timer!=-1||$timer!=0){
       $timer_date = date('Y-m-d', strtotime("{$_POST['contactDate']} +{$timer} day"));
     }
     $data = array(

       'timer' =>$timer,
       'contact_date'=> $_POST['contactDate'],
       'timer_date'=>$timer_date
     );

     $this->db->where('cid', $_POST['id']);
     $this->db->update('sponsorinfo', $data);

     $data = array(
             'cid' => $_POST['id'],
             'contact' => $_POST['contactContent'],
             'staff_id' =>$_POST['staff_id'] ,
             'is_delete' => 0,
             'contact_date' =>  $_POST['contactDate'],
             'created' =>  date("Y-m-d H:i:s")
     );
        $this->db->insert('customercontact', $data);



   }

   public function getContactsLatest(){
     $result = $this->db->query("SELECT *,count(*) count FROM customercontact where cid =".$_POST['id'].' and is_delete = 0 order by created desc')->result();
     $this->db->close();

     return $result;
   }


    public function getGenre()
        {

        $result = $this->db->query('SELECT * FROM genre ')->result();
        $this->db->close();

        return $result;


        }

    public function getStaff()
        {

        $result = $this->db->query('SELECT * FROM staff')->result();
        $this->db->close();

        return $result;


        }
    public function getGroup()
        {

        $result = $this->db->query('SELECT * FROM staffgroup where is_delete=0 order by id desc')->result();
        $this->db->close();

        return $result;


        }


        public function customertype()
            {

            $result = $this->db->query('SELECT * FROM customertype where is_delete=0')->result();
            $this->db->close();

            return $result;


            }
        public function getStatus()
            {

            $result = $this->db->query('SELECT * FROM status where is_delete=0')->result();
            $this->db->close();
            return $result;
            }
        public function getAgency(){
          $result=$this->db->query("SELECT id,agency_name FROM agencyinfo where is_deleted=0")->result();
          $this->db->close();
          return $result;
        }


            public function getStatusComment()
                {

                $result = $this->db->query('SELECT * FROM statuscomment where is_delete=0')->result();
                $this->db->close();

                return $result;


                }



        public function update(){

          $query = $this->db->query('SELECT * FROM statustracking WHERE sid ='.$_POST['id'])->result();
          $end=$this->db->query('SELECT * FROM statustracking WHERE sid ='.$_POST['id'].' order by id desc limit 1')->row()->status;
          //같은 스테이터스가 들어가지않도록
          $flag=0;
          for($i=0;$i<count($query);$i++)  {
            if(trim($query[$i]->status)==$_POST['status']  ){

                $flag=1;
            }

          }
          if($_POST['status']==0 && $end!=0){
            $flag=0;
          }

          if($flag==0){

            $query = $this->db->query('select max(id) as id from statustracking');
            $ctcid= $row = $query->row()->id;
            $ctcid=$ctcid*1;
            $ctcid++;
                      $data = array(
                        'id' =>$ctcid,
                        'sid' => $_POST['id'],
                        'status' => $_POST['status'],
                        'staff' =>  $_POST['staff_id'],
                        'is_delete' => 0,
                        'created' =>  date("Y-m-d H:i:s"),
                        'updated' =>date("Y-m-d H:i:s")

                );

            $this->db->insert('statustracking', $data);

          }


              $tel=preg_replace("/[^0-9]*/s", "", $_POST['tel']);



              $data = array(
                'name' => $_POST['companyName'],
                'service_name' => strip_tags($_POST['service_name']),
                'tel' => strip_tags($tel),
                'email' => strip_tags($_POST['email']),
                'customer_type'=>$_POST['customer_type']

        );

        $this->db->where('id', $_POST['id']);
        $this->db->update('customerlist', $data);

        $timer;
        if($_POST['timer']=='連絡予定なし'){
          $timer=-1;
        }

        else{
          $timer=$_POST['timer'];
        }

        $data = array(
          'agency_id' =>$_POST['agency_id'],
          'staff_id' => $_POST['staff_id'],
          'rtg_staff_id' => $_POST['all_staff_id'],
          'rid_product'=>$_POST["rid_product"],
          'url' => $_POST['url'],
          'genre_id' => strip_tags($_POST['genre_id']),
          'director' => strip_tags($_POST['director']),
          'director_status' =>strip_tags( $_POST['director_status']),
          'president' => strip_tags($_POST['president']),
          'zip' => strip_tags($_POST['zip']),
          'addr' => strip_tags($_POST['address']),
          'building' => strip_tags($_POST['building']),
          'status' => strip_tags($_POST['status']),
          'status_comment' => strip_tags($_POST['status_comment']),
          'priority' => strip_tags($_POST['priority']),
          "appo_date"=>$_POST["appo_date"],
          "appo_staff_id"=>$_POST["appo_staff_id"],
          'timer' => $timer,
          'info_source' => strip_tags($_POST['info_source']),
          'info_source_comment' => strip_tags($_POST['info_source_comment']),
          'status_etc' => strip_tags($_POST['status_etc']),
          'rid_sponsor' => $_POST['rid_sponsor']
        );

        $this->db->where('cid', $_POST['id']);
        $this->db->update('sponsorinfo', $data);


            }

}

?>
