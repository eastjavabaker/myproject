<?php

$url = (isset($_GET['url']))?$_GET['url']:"";

/** Main Call Function **/

function callHook() {
	global $url;

	$urlArray = array();
	$urlArray = explode("/",$url);

	$controller = (!empty($urlArray[0]))?$urlArray[0]:"default";
	array_shift($urlArray);
	$action = (!empty($urlArray[0]))?$urlArray[0]:"index";
	array_shift($urlArray);
	$queryString = $urlArray;

	$controllerName = $controller;
	$controller = ucwords($controller);
	$model = rtrim($controller, 's');
	$controller .= 'Controller';
	$dispatch = new $controller($model,$controllerName,$action);

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$queryString);
	} else {
		/* Error Generation Code Here */
	}
}

function __autoload($classname) {
         
         if (file_exists(BASE_LIBS."controller.php")){
             require_once BASE_LIBS."controller.php";
         }else{
             echo "Error, no controller class !";exit();
         }
         
         
         if (file_exists(BASE_LIBS."template.php")){
             require_once BASE_LIBS."template.php";
         }else{
            echo "Error, no template class !";exit();
         }
         
         if (file_exists(BASE_LIBS."mydb.php")){
             require_once BASE_LIBS."mydb.php";
         }else{
             echo "Error, no mydb class !";exit();
         }
         
         /*if (file_exists(BASE_LIBS."model.php")){
             require_once BASE_LIBS."model.php";
         }else{
             echo "Error, no model lib class !";exit();
         }*/
         
         $model = BASE_MODEL.preg_replace("/controller/", "", strtolower($classname)).".php";
         
         if (file_exists($model)){
             require_once $model;
         }else{
             //echo "Error, no model class !";exit();
         }
         
         if (file_exists(BASE_CONTROLLER.$classname.".php")){
             
             require_once BASE_CONTROLLER.$classname.".php";
             
         }else{
             echo "Error, no ".BASE_CONTROLLER."$classname class !";exit();
         }
         
} 

callHook();

?>