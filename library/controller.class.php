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

        $this->$model = new $model;
        $this->_template = new Template($controller,$action);

    }

    function set($name,$value) {
        $this->_template->set($name,$value);
    }

    function __destruct() {
        global $is_API;
        if(!$is_API) $this->_template->render();
        if(!is_login() && !strpos($this->_action, "inForm") ) redirect(_BASE_URL_."/users/loginForm");
    }

}