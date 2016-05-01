<?php

class Database
{

	private static $db;

	private static $servername = '127.0.0.1';
	private static $dbname = 'tnsdb';
	private static $username = 'root';
	private static $password = 'kilamoChi';

	public static function getInstance()
	{
		if ( ! self::$db) {
			self::$db = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname, self::$username, self::$password);
		}

		return self::$db;
	}
}