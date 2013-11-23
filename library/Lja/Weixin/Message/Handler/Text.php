<?php

class Lja_Weixin_Message_Handler_Text extends Lja_Weixin_Message_Handler_Base {
	protected $type = 'text';

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

		parent::process();
	}

	protected function helpResponse()
	{
		$content = "回复 1 获取店铺地址\n";
		$content .= "回复 2 获取相册地址\n";

		$this->structure->Content = $content;
	}

	protected function getShopAddress()
	{
		$this->structure = &self::initStructure('link', $this->msg);
		$this->structure->Title = '一路妖娆';
		$this->structure->Description = '一路妖娆的淘宝店铺地址';
		$this->structure->Url = 'http://shop33487592.taobao.com/';
	}

	protected function getGalleryAddress()
	{
		$this->structure = &self::initStructure('link', $this->msg);
		$this->structure->Title = '一路妖娆';
		$this->structure->Description = '一路妖娆的相册地址';
		$this->structure->Url = 'http://mara.ipbfans.org/';
	}
}