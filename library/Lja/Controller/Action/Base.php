<?php

require_once 'Zend/Controller/Action.php';

class Lja_Controller_Action_Base extends Zend_Controller_Action {
	protected $isAjax = false;
	protected $aName = '';
	protected $MODULE = '';
	protected $URL = '';

	public function init() {
		parent::init();
		
		Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer')->setViewSuffix('php');
		$this->view->isAjax = $this->isAjax = $this->getRequest()->isXmlHttpRequest();
		$this->view->cName = $this->_request->getControllerName();
		$this->view->ACTION = $this->aName = $this->_request->getActionName();
		
		$name = $this->_request->getControllerName ();
		$m = $this->_request->getModuleName();

		$this->URL = $this->view->URL = $m=='default' ? $name : $this->_request->getModuleName().'/'.$name;
		$this->MODULE = $this->view->MODULE = $this->_request->getModuleName();

		session_start();
	}

	protected function M($m='') {
		$className = 'Lja_Db_Table_'.ucfirst( $m ? $m : $this->_request->getControllerName () );
		return new $className ();
	}
	
}