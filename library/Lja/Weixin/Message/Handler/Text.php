<?php

class Lja_Weixin_Message_Handler_Text extends Lja_Weixin_Message_Handler_Base {

	public function process() {
		switch (trim($this->msg->Content)) {
			case '1':
				$this->getShopAddress();
				break;
			case '2':
				$this->getGalleryAddress();
				break;
			default:
				$this->helpResponse();
				break;
		}
	}

	protected function helpResponse()
	{
		$content = "回复 1 获取店铺地址\n";
		$content .= "回复 2 获取相册地址\n";

		$this->response(array(
			'ToUserName' => $this->msg->FromUserName,
			'FromUserName' => $this->msg->ToUserName,
			'CreateTime' => time(),
			'MsgType' => 'text',
			'Content' => $content,
			'MsgId' => '1234567'
			));
	}

	protected function getShopAddress()
	{
		$this->response(array(
			'ToUserName' => $this->msg->FromUserName,
			'FromUserName' => $this->msg->ToUserName,
			'CreateTime' => time(),
			'MsgType' => 'text',
			'Content' => '店铺地址是： http://shop33487592.taobao.com/',
			'MsgId' => '1234567'
			));
	}

	protected function getGalleryAddress()
	{
		$this->response(array(
			'ToUserName' => $this->msg->FromUserName,
			'FromUserName' => $this->msg->ToUserName,
			'CreateTime' => time(),
			'MsgType' => 'text',
			'Content' => '相册地址是： http://mara.ipbfans.org/',
			'MsgId' => '1234567'
			));
	}
}