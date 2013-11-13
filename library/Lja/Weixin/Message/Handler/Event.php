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
		$xml = new Lja_Weixin_Message_Structure_Text();
		$xml->ToUserName = $this->msg->FromUserName;
		$xml->FromUserName = $this->msg->ToUserName;
		$xml->CreateTime = time();
		$xml->Content = '您好，欢迎关注“一路妖娆**苏州外贸”的微信帐号！本店淘宝店铺网址为：http://shop33487592.taobao.com/';

		Lja_Log::i()->debug($xml);

		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}

	private function _processUbsubscribe() {
		$xml = new Lja_Weixin_Message_Structure_Text();
		$xml->ToUserName = $this->msg->FromUserName;
		$xml->FromUserName = $this->msg->ToUserName;
		$xml->CreateTime = time();
		$xml->Content = '非常感谢';
		
		Lja_Log::i()->debug($xml);
		
		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}
}