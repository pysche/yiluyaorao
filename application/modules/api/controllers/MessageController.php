<?php

class Api_MessageController extends Lja_Controller_Action_Api {

	public function indexAction() {
		$signature = $this->getRequest()->getParam('signature', '');	//	微信加密签名
		$timestamp = $this->getRequest()->getParam('timestamp', '');	//	时间戳
		$nonce = $this->getRequest()->getParam('nonce', '');			//	随机数
		$echostr = $this->getRequest()->getParam('echostr', '');		//	随机字符串

		Lja_Log::i()->debug($signature.'-'.$timestamp.'-'.$nonce.'-'.$echostr.'-'.Lja_Weixin::sign($timestamp, $nonce));
		die($echostr);
	}
}