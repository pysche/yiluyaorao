<?php

class Lja_Weixin_Message_Handler_Base {
	protected $msg = null;

	public function __construct($msg) {
		$this->msg = $msg;
	}

	public function process() {

	}

	protected function response($arr) {
		$xml = "<xml>\n";

		foreach ($arr as $k=>$v) {
			$xml .= '<'.$k.'>';
			$xml .= is_numeric($v) ? $v : '<![CDATA['.$v.']]';
			$xml .= '</'.$k.'>'."\n";
		}

		$xml .= "</xml>";

		return $xml;
	}
}