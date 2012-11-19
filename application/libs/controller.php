<?php
class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	function __construct($model, $controller, $action) {

		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;
                //echo $model;exit();
		//print_r($model);
		//$this->$model =& new $model;
		//print_r($this->$model);exit();
		$this->_template = new Template($controller,$action);

	}
        
	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
		$this->_template->render();
	}

}