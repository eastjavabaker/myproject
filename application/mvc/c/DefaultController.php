<?php

class DefaultController extends Controller {
      
      /*protected $_localobj;
      
      function __construct() {
              $this->_localobj = new Defaults;
      }
      
      function myobj(){
               $hai = new Defaults;
               return $hai;
      }*/
      
      function index(){
               $this->set('title', "idmlm web base mlm software");              
                               
      }
      
      function test2($id, $id2){
               echo "id = $id , id2 = $id2";
      }
      
}

?>