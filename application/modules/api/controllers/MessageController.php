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
		$xml = $this->getRequest()->getRawBody();
		Lja_Log::i()->debug($xml);

		try {
			$data = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)

			switch ($data->MsgType) {
				case 'text':			//	文本消息
				case 'image':			//	图片消息
				case 'location':		//	地理位置消息
				case 'event':			//	事件消息
				case 'link':			//	链接消息
					$handler = &Lja_Weixin_Message_Handler::factory($data->MsgType);
					break;				
			}
		} catch (Exception $e) {
			Lja_Log::i()->exception($e);
		}

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

	protected function parseXml($xml) {

	}
}