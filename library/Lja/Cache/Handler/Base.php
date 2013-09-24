<?php

/**
 * 缓存处理器基类
 * 
 * @author pang
 *
 */

abstract class Lja_Cache_Handler_Base
{
	protected $options = array();
	
	public function __construct(array $options=array())
	{
	}
	
	protected function key($key)
	{
		$config = Lja_Config::appConfig()->cache->prefix;
		return $config.$key;
	}
	
	abstract public function &get($key);
	abstract public function set($key, $val=null, $ttl=0);
	abstract public function delete($key);

	public function increase($key, $step=1)
	{
		return $this->set($key, intval($this->get($key))+$step);
	}
}