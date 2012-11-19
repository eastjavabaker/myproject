<?php
/*
Author : invisiblecoder@ovi.com
Namespace : Static Content Type Class
Type : Static content

created : 10-10-2011

*/

namespace Eastjavabaker\StaticContent;

use Eastjavabaker\Db\MyDb;

class Standart extends MyDb {
      
      protected $staticid;
      
      function set_staticid($id){
               $this->staticid = $id;
      }
      
      function get_staticid(){
               return $this->staticid;
      }
      
      
      function getStaticContent($id){
               $sql = "select * from mod_static_contents where static_id IN ($id) ";
               $rs = $this->DBQuery($sql);
               $data = $rs->fetch();
               return $data; 
      }
      
            
      
      
      
}



?>