<?php

class Lja_Weixin_Message_Handler_Base {
	protected $msg = null;
	protected $structure = null;
	protected $type = 'base';

	public function __construct($msg) {
		$this->msg = $msg;

		$structureClass = 'Lja_Weixin_Message_Structure_'.ucfirst(strtolower($this->type));
		$this->structure = new $structureClass();

		try {
			$this->structure->FromUserName = $this->msg->ToUserName;
			$this->structure->ToUserName = $this->msg->FromUserName;
			$this->structure->MsgType = ucfirst(strtolower($this->type));
			$this->structure->MsgId = $this->msg->MsgId;
		} catch (Exception $e) {

		}
	}

	public function process() {
		$this->sendResponse();
	}

	protected function sendResponse()
	{
		$this->structure->CreateTime = time();
		$xml = $this->structure->__toString();

		Lja_Log::i()->send($xml);

		header('Content-Type: text/xml; charset=utf-8');
		header('Content-Length: '.strlen($xml));
		echo $xml;
		exit(0);
	}
}