<?php

class Lja_Weixin_Message_Handler_Base {
	protected $msg = null;

	public function __construct($msg) {
		$this->msg = $msg;
	}

	public function process() {

	}

	protected function response($arr) {
		$xml = "<xml>";

		foreach ($arr as $k=>$v) {
			$xml .= '<'.$k.'>';
			$xml .= is_numeric($v) ? $v : '<![CDATA['.$v.']]';
			$xml .= '</'.$k.'>';
		}

		$xml .= "</xml>";

		Lja_Log::i()->send($xml);

		return $xml;
	}
}