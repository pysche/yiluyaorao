<?php

/**
 * 配置项解析、加载
 * 
 */
require_once 'Zend/Config/Ini.php';
require_once 'Lja/Cache/Local.php';

class Lja_Config
{
	protected static $config = null;
	protected static $cityConfig = array();
	
	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if (!self::$config) {
			if (APPLICATION_ENV=='production' && !CRM_FORCE_RELOAD_CONFIG) {
				$cacher = &Lja_Cache_Local::getInstance();
				self::$config = $cacher->get('application_ini');
				if (!self::$config) {
					self::$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
					$cacher->set('application_ini', self::$config);
				}
			} else {
				self::$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
			}
		}
		
		return self::$config;
	}
	
	/**
	 * 获取应用程序配置，即msd开头的配置项
	 * 
	 * @return Zend_Config_Ini
	 */
	public static function &appConfig()
	{
		self::getInstance();
		$lja = self::$config->lja;
		return $lja;
	}
	
}