<?php
// class DB
namespace Eastjavabaker\Db;

use Doctrine\Common\ClassLoader;
use Doctrine\DBAL\DriverManager as Dbcomm;

require BASE_DIR.'application/libs/doctrine-dbal/Doctrine/Common/ClassLoader.php';

class MyDb extends ClassLoader {
      
      private function getDbConfig(){
              $xmlget = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/oop/application/config/database.xml");
              return $xmlget;
      }
      
      function Connect(){
               $db = $this->getDbConfig();               
 
               $classLoader = new ClassLoader('Doctrine', BASE_DIR.'application/libs/doctrine-dbal');
               $classLoader->register();
               $config = new \Doctrine\DBAL\Configuration();

               $connectionParams = array(
                          'dbname' => $db->dbname,
                          'user' => $db->username,
                          'password' => $db->password,
                          'host' => $db->host,
                          'driver' => 'pdo_mysql'
                          );
               
               $conn = Dbcomm::getConnection($connectionParams, $config);
               return $conn;
      }
      
     
      function DBQuery($sql){               
               $rs = $this->Connect()->query($sql);
               return $rs;
      }
      
      function DBClose($conn){
               mysql_close($this->Connect());
      }
      
}


?>