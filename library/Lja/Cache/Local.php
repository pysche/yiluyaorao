<?php

/**
 * 本地缓存处理（APC、WinCache）
 * 一般保存与机器相关的配置项、PHP的OPCache
 * 
 * @author pang
 *
 */

class Lja_Cache_Local extends Lja_Cache_Base
{
	protected static $instance = null;
	
	private function __construct()
	{
	
	}
	
	public static function &getInstance()
	{
		if (self::$instance==null) {
			self::$instance = self::loadHandler(CRM_LOCAL_CACHER);
		}
	
		return self::$instance;
	}	
}