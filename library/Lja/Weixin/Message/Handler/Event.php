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
        $xml = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>";  
		$xml = sprintf($xml, $this->msg->FromUserName, $this->msg->ToUserName, time(), 'text', '您好，欢迎关注“一路妖娆**苏州外贸”的微信帐号！本店淘宝店铺网址为：http://shop33487592.taobao.com/');
		Lja_Log::i()->debug($xml);

		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}

	private function _processUbsubscribe() {
        $xml = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>";  
		$xml = sprintf($xml, $this->msg->FromUserName, $this->msg->ToUserName, time(), 'text', '非常感谢');
		Lja_Log::i()->debug($xml);
		
		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}
}