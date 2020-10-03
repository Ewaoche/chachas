<?php


class index{
	
	public $_status = '';
	public $_form = '';
	public $_path = '';
	
	public $_css = '';
	public $_js = '';
	public $_php = '';
	public $_phtml = '';
	
	public function __construct($status){
		$this->_status = $status;
		$this->_form = $status;
		$this->_path = "./index/" . $status . "/" ;
		$this->_css = $this->_path . $status . ".css";
		$this->_js = $this->_path . $status . ".js";
		$this->_php = $this->_path . $status . ".php";
		$this->_phtml = $this->_path . $status . ".phtml";
	}
		
}




?>