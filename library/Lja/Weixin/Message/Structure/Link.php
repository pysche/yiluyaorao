<?php

class Lja_Weixin_Message_Structure_Link extends Lja_Weixin_Message_Structure_Base
{
	public function __construct()
	{
		$this->Title = '';
		$this->Description = '';
		$this->Url = '';
		$this->MsgType = 'link';
		
		parent::__construct();
	}
}