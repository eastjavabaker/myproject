<?php
/*
Author : invisiblecoder@ovi.com
Namespace : MLM Type Class
Type : Binary

last update : 15-08-2011

*/

namespace Eastjavabaker\Mlm;

use Eastjavabaker\Db\MyDb;

class Binary extends MyDb {
      
      private $rootid;
      private $period;
      protected $arrdownline = array();
      protected $level;
      
      public function set_root_downline($rootid) {
               $this->rootid=$rootid;               
      }
      
      public function get_root_downline(){
               return $this->rootid;
      }
      
      private function set_level($level){
               $this->level = $level;
      }
      
      private function get_level(){
               return $this->level;
      }
      
      private function set_period($period){
               $this->period = $period;   
      }
      
      private function get_period(){
               return $this->period;
      }
      
      private function is_paired($in){
               $sql = "select leftpos, rightpos from sys_mlmmembers where entity_id IN ($in) ";
               $rs = $this->DBQuery($sql);
               if($data = $rs->fetch()){
                  if($data['leftpos'] && $data['rightpos']){
                      return 1;            
                  }else{
                      return -1;
                  }
               }else{
                  return -1;
               }
      }
      
      private function smallpair_bonus($l, $r){
               if($l && $r){
                  return 1;
               }else{
                  return 0;
               }
      }
      
      private function bigpair_bonus(){
        
      }
      
      public function set_downline($rootid, $positionvar = ""){
              
               $in = "-1";
               if(is_array($rootid)){
                  foreach($rootid as $v){
                          $in.= ",".$v;
                  }                  
                  $sql = "select entity_id, parent_id, position from sys_mlmmembers where parent_id IN ($in) ";                
               }else{
                  $in = "-2";
                  $pos = ($positionvar!="")?"and position IN ('$positionvar') ":"and position IN ('L','R')";
                  $sql = "select entity_id, parent_id, position from sys_mlmmembers where parent_id IN ($rootid) $pos ";
               }

               $rs = $this->DBQuery($sql);

               $arrid = array();
            if($in!="-1"){
               
               $level = ($this->get_level())?$this->get_level():1;
                
               while($data = $rs->fetch()){
                     array_push($this->arrdownline, $level.",".$data['parent_id'].",".$data['position'].",".$data['entity_id']);
                     $arrid[$data['entity_id']] = $data['entity_id'];
               }
               
               $this->set_level($level+1);
               
               return $this->set_downline($arrid);
            }else{
               return -1;  
            }
               
      }
      
      public function get_downline(){
               return $this->arrdownline;
      }
      
      
}



?>