<?php

require_once BASE_LIBS."mystatic.php";

class Plans  {
      
           
      function test(){
          $hai = new Eastjavabaker\StaticContent\Standart();
          $hai->set_staticid(1);

          $test = $hai->getStaticContent($hai->get_staticid());
          unset($hai);
          return $test;
          
      }
    
}

?>