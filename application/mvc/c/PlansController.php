<?php

class PlansController extends Controller {
      
      function myobj() {
               $obj = new Plans;
               return $obj;
      }
      function test(){
               return $this::myobj()->test();
      }
      
      function index(){
            //echo $this->test();
            $this->set('data', $this->test());
      }
      
      
}

?>