<?php

class Lja_Weixin_Message_Handler {

	public static function &factory($messageType) {
		$handler = null;
		$handlerClass = 'Lja_Weixin_Message_Handler_'.ucfirst(strtolower($messageType));

		if (class_exists($handlerClass)) {
			$handler = new $handlerClass;
		}

		return $handler;
	}
}