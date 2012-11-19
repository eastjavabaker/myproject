<?php

class NewsController extends Controller {
      
      function index(){
               echo "News";
      }
      
      function detil($id, $title){
               echo "detil $id , title = $title";
      }
      
}

?>