<?php
/*
Author : invisiblecoder@ovi.com
Namespace : Template Class
Type : Main Template class

last update : 26-09-2011

*/

class Template {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {
		$this->_controller = $controller;
		$this->_action = $action;
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	/** Display Template **/

    function render() {
		extract($this->variables);
                 
			if (file_exists(BASE_VIEW . $this->_controller . '/' . 'header.php')) {
				include (BASE_VIEW . $this->_controller . '/' . 'header.php');
			} else {
				include (BASE_VIEW . 'layout/header.php');
			} 

        include (BASE_VIEW . $this->_controller . '/' . $this->_action . '.php');		 

			if (file_exists(BASE_VIEW . $this->_controller . '/' . 'footer.php')) {
				include (BASE_VIEW . $this->_controller . '/' . 'footer.php');
			} else {
				include (BASE_VIEW . 'layout/footer.php');
			} 
    }

}
?>