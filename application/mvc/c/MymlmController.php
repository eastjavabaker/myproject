<?php

class MymlmController extends Controller {
      
           
      function index(){
               $hai = new Eastjavabaker\Mlm\Binary();
               $hai->set_root_downline(1);

               $hai->set_downline($hai->get_root_downline());
               echo "<pre>";
               print_r($hai->get_downline());
               echo "</pre>";
               exit();
      }
      
      function getchild($id){
               $hai = new Eastjavabaker\Mlm\Binary();
               $hai->set_root_downline($id);

               $hai->set_downline($hai->get_root_downline());
               echo "<pre>";
               print_r($hai->get_downline());
               echo "</pre>";
               exit();
      }
      
}

?>