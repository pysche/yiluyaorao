<?php

class Api_MessageController extends Lja_Controller_Action_Api {

	public function indexAction() {
		$method = $this->getRequest()->getMethod();

		switch ($method) {
			case 'GET':
				$this->siteValidate();
				break;
			case 'POST':
				$this->processMessage();
				break;
			default:
				exit;
				break;
		}
	}

	protected function siteValidate() {
		$signature = $this->getRequest()->getParam('signature', '');	//	微信加密签名
		$timestamp = $this->getRequest()->getParam('timestamp', '');	//	时间戳
		$nonce = $this->getRequest()->getParam('nonce', '');			//	随机数
		$echostr = $this->getRequest()->getParam('echostr', '');		//	随机字符串

		$sign = Lja_Weixin::sign($timestamp, $nonce);

		echo $sign==$signature ? $echostr : 'forbidden';
		exit;
	}

	protected function processMessage() {
		Lja_Log::i()->debug(var_export($_POST, true));

		die("OK");
	}
}