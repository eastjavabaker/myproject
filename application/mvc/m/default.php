<?php
require_once BASE_LIBS."mymlm.php";

class Defaults  {
      
      function test(){
          $hai = new Eastjavabaker\Mlm\Binary();
          $hai->set_root_downline(1);

          $hai->set_downline($hai->get_root_downline());
          $test = $hai->get_downline();
          unset($hai);
          return $test;
          
      }
    
}

?>