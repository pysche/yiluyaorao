<?php

/**
 * 远端缓存处理（Memcached、Mecachedb）
 * 保存与机器无关的缓存，如某些数据库查询结果
 * 
 * @author pang
 *
 */

class Lja_Cache_Remote extends Lja_Cache_Base
{
	protected static $instance = null;
	
	private function __construct()
	{
	}
	
	/**
	 * 获取远端缓存实例
	 * 
	 */
	public static function &getInstance()
	{
		if (self::$instance==null) {
			$options = Lja_Config::appConfig()->cache->handler->remote->toArray();
			self::$instance = self::loadHandler('Memcache', $options);
		}
		
		return self::$instance;
	}
}