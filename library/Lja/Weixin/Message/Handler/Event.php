<?php

class Lja_Weixin_Message_Handler_Event extends Lja_Weixin_Message_Handler_Base {
	
	public function __construct($msg) {
		parent::__construct($msg);
	}

	public function process() {
		switch ($this->msg->Event) {
			case 'subscribe':		//	订阅
				$this->_processSubscribe();
				break;
			case 'unsubscribe':
				$this->_processUbsubscribe();
				break;
		}
	}

	private function _processSubscribe() {
		$xml = $this->response(array(
				'ToUserName' => $this->msg->FromUserName,
				'FromUserName' => $this->msg->ToUserName,
				'CreateTime' => time(),
				'MsgType' => 'text',
				'Content' => '一路妖娆感谢您的关注'
				));

		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}

	private function _processUbsubscribe() {
		$xml = $this->response(array(
				'ToUserName' => $this->msg->FromUserName,
				'FromUserName' => $this->msg->ToUserName,
				'CreateTime' => time(),
				'MsgType' => 'text',
				'Content' => '非常感谢'
				));

		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}
}