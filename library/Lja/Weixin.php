<?php

class Lja_Weixin {

	public static function sign($t, $n) {
		$token = Lja_Config::appConfig()->weixin->token;
		$arr = array(
			$token, $t, $n
			);
		asort($arr);
		$sign = sha1(implode('', $arr));

		return $sign;
	}
}