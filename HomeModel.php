<?php
  class HomeModel extends CI_Model 
      { 
	
       public function getData() 
          { 
           $query = $this->db->get('User'); 
           return $query->result();
          } 
          
       public function did_get_user_data($ire)
          {

            $this->db->select('*');
            $this->db->from('User');   
            $this->db->where('id', $ire); 
            $query = $this->db->get();

            if ( $query->num_rows() > 0 )
                  {
                      $row = $query->result();
                      return $row;
                  }

          } 
      }   
?>