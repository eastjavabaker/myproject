<?php

class FeaturesController extends Controller {
      
      function myobj() {
               $obj = new Features;
               return $obj;
      }
      function test(){
               return $this::myobj()->index();
      }
      
      
      
}

?>