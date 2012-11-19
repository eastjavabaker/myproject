<?php
/*
Author : invisiblecoder@ovi.com
Namespace : News Type Class
Type : Standart News

last update : 15-08-2011

*/

namespace Eastjavabaker\News;

use Eastjavabaker\Db\MyDb;

class Standart extends MyDb {
      
      private function set_page($page){
               $this->level = $page;
      }
      
      private function get_page(){
               return $this->page;
      }
      
            
      
      
      
}



?>