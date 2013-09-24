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
			$xml .= '<'.$k.'>'.'<![CDATA['.$v.']]'.'</'.$k.'>'."\n";
		}

		$xml .= "</xml>";

		return $xml;
	}
}