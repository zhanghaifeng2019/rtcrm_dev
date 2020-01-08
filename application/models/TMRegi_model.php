<?php
class TMRegi_model extends CI_Model {

    public function insert()
        {
    $query = $this->db->query('select max(id) as id from customerlist');
    $id= $row = $query->row()->id;
    $id=$id*1;
    $id++;
    $tel=preg_replace("/[^0-9]*/s", "", $_POST['tel']);
        if(!empty($_POST['contactContent']))
      {

        $data = array(
                    'cid' => $id,
                    'contact' => $_POST['contactContent'],
                    'staff_id' =>$_POST['staff_id'] ,
                    'is_delete' => 0,
                    'contact_date' =>  $_POST['contactDate'],
                    'created' => date("Y-m-d H:i:s")
            );
               $this->db->insert('customercontact', $data);
      }



          $data = array(
            'id' =>$id,
            'cid' => $id,
            'name' => $_POST['companyName'],
            'service_name' => $_POST['service_name'],
            'tel' => $tel,
            'email' => $_POST['email'],
            'domain' => $_POST['url'],
            'customer_type' => 1,
            'en_search' => null,
            'is_history' =>0,
            'is_delete' => 0,
            'created' =>  date("Y-m-d H:i:s"),
            'modified' =>date("Y-m-d H:i:s")

    );





    $this->db->insert('customerlist', $data);

    $query = $this->db->query('select max(id) as id from statustracking');
    $ctcid= $row = $query->row()->id;
    $ctcid=$ctcid*1;
    $ctcid++;
              $data = array(
                'id' =>$ctcid,
                'sid' => $id,
                'status' => $_POST['status'],
                'staff' => $_POST['staff_id'],
                'is_delete' => 0,
                'created' =>  date("Y-m-d H:i:s"),
                'updated' =>date("Y-m-d H:i:s")

        );
    $this->db->insert('statustracking', $data);

    // $data = array(
    //     'id' =>$ctcid+1,
    //   'sid' => $id,
    //   'status' => -1,
    //   'staff' => $_POST['staff_id'],
    //   'is_delete' => 0,
    //   'created' =>  date("Y-m-d H:i:s"),
    //   'updated' =>date("Y-m-d H:i:s")
    //
    //   );
    // $this->db->insert('statustracking', $data);
    //



    $timer=$_POST['timer'];
    if($_POST['timer']=='連絡予定なし'){
      $timer=-1;
    }

    $timer_date=null;
    if($timer!=-1||$timer!=0){
      $timer_date = date('Y-m-d', strtotime("{$_POST['contactDate']} +{$timer} day"));
    }
    $data = array(
      'id' =>$id,
      'agency_id' =>$_POST['agency_id'],
      'cid' => $id,
      'rtg_staff_id' => $_POST['all_staff_id'],
      'rid_product' =>$_POST['rid_product'],
      'rid_sponsor' =>$_POST['rid_sponsor'],
      'status_etc'=>$_POST['status_etc'],
      'staff_id' => $_POST['staff_id'],
      'url' => $_POST['url'],
      'genre_id' => $_POST['genre_id'],
      'director' => $_POST['director'],
      'director_status' => $_POST['director_status'],
      'president' => $_POST['president'],
      'zip' => $_POST['zip'],
      'addr' => $_POST['address'],
      'building' => $_POST['building'],
      'status' => $_POST['status'],
      'status_comment' => $_POST['status_comment'],
      'priority' => $_POST['priority'],
      "appo_date"=>$_POST["appo_date"],
      "appo_staff_id"=>$_POST["appo_staff_id"],
      'timer' => $timer,
      'info_source' => $_POST['info_source'],
      'info_source_comment' => $_POST['info_source_comment'],
      'created' =>  date("Y-m-d H:i:s"),
      'modified' =>date("Y-m-d H:i:s"),
      'contact_date'=>$_POST['contactDate'],
      'timer_date'=>$timer_date

    );


    $this->db->insert('sponsorinfo', $data);
    return $id;
        }

}

?>
