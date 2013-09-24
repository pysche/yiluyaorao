<?php

class Lja_Db {

	protected static $tables = array();

	public static function &t($table) {
		if (!isset(self::$tables[$table])) {
			$class = 'Lja_Db_Table_'.ucfirst(strtolower($table));
			self::$tables[$table] = new $class;
		}

		return self::$tables[$table];
	}
}