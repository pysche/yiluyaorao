<?php

class Lja_Weixin_Message_Structure_Text extends Lja_Weixin_Message_Structure_Base
{
	public function __construct()
	{
		$this->Content = '';
		$this->MsgType = 'text';
		
		parent::__construct();
	}
}