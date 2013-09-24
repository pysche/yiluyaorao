<?php

class Api_MessageController extends Lja_Controller_Action_Api {

	public function indexAction() {
		if ($this->validateSign()) {
			$method = $this->getRequest()->getMethod();

			switch ($method) {
				case 'GET':
					$echostr = $this->getRequest()->getParam('echostr', '');		//	随机字符串
					echo $echostr;
					break;
				case 'POST':
					$this->processMessage();
					break;
			}
		}

		exit;
	}

	protected function siteValidate() {
		$signature = $this->getRequest()->getParam('signature', '');	//	微信加密签名
		$timestamp = $this->getRequest()->getParam('timestamp', '');	//	时间戳
		$nonce = $this->getRequest()->getParam('nonce', '');			//	随机数

		$sign = Lja_Weixin::sign($timestamp, $nonce);

		return $sign==$signature;
	}

	protected function processMessage() {
		$body = $this->getRequest()->getRawBody();
		Lja_Log::i()->debug($body);

		die("OK");
	}

	protected function validateSign() {
		$signature = $this->getRequest()->getParam('signature', '');	//	微信加密签名
		$timestamp = $this->getRequest()->getParam('timestamp', '');	//	时间戳
		$nonce = $this->getRequest()->getParam('nonce', '');			//	随机数
		$echostr = $this->getRequest()->getParam('echostr', '');		//	随机字符串

		$sign = Lja_Weixin::sign($timestamp, $nonce);

		return $sign==$signature;
	}
}