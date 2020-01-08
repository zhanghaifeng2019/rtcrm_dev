<?php
class Auth_model extends CI_Model {

  function confirmEmail($email){
    $result = $this->db->query("SELECT email FROM staff where is_delete=0")->result();
    $this->db->close();
    $flag=0;
    foreach ($result as $item ) {
      if(trim($item->email)==$email){
        $flag=1;
      }

    }
    return $flag;
  }
  function insertTokenInfo($token,$email){
    $query = $this->db->query('select id from staff where email="'.$email.'"');
    $id= $row = $query->row()->id;

    $data = array(
      'staff_id' => $id,
      'token' => $token,
      'ip' => $_SERVER['REMOTE_ADDR'],
      'created' =>  date("Y-m-d H:i:s"),
      'modified' =>date("Y-m-d H:i:s")

);

      $this->db->insert('staffreminder', $data);

  }

  function getinfo($token){
    $query = $this->db->query('select * from staffreminder where token="'.$token.'"');
    $row = $query->row();
    return $row;

  }

  function getEmail($id){
    $query = $this->db->query('select * from staff where id="'.$id.'"');
    $row = $query->row();
    return $row;

  }
  function confirmToken($token){
      $query = $this->db->query('select * from staffreminder where token="'.$token.'"');
      $row = $query->row();

      if($row=='NULL'){
        return 0;
      }
      else{
        $targetTime=strtotime($row->created);
        $now=strtotime(date("Y-m-d H:i:s"));
        $sum=$now-$targetTime;

        if($sum>1800){
          return 0;
        }
        else{
          return 1;
        }
      }

  }
  function updatePass($pass,$id,$email){

              $data = array(
                'password' =>crypt($pass,$email)
          );

          $this->db->where('id', $id);
          $this->db->update('staff', $data);

  }

  function tokenGen($email){

   return md5($email.date( 'Y-m-d H:i:s', time()));
  }


}
