<?php

class Lja_Weixin_Message_Handler_Base {
	protected $msg = null;
	protected $structure = null;
	protected $type = 'base';

	public function __construct($msg) {
		$this->msg = $msg;
		$this->structure = &self::initStructure($this->type, $this->msg);
	}

	protected function &initStructure($type, $msg) {
		$structureClass = 'Lja_Weixin_Message_Structure_'.ucfirst(strtolower($type));
		$structure = new $structureClass();

		try {
			$structure->FromUserName = $msg->ToUserName;
			$structure->ToUserName = $msg->FromUserName;
			$structure->MsgType = ucfirst(strtolower($type));
			$structure->MsgId = $msg->MsgId;
		} catch (Exception $e) {

		}

		return $structure;
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