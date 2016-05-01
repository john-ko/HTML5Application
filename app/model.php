<?php

class Model
{
	protected $dbh;
	protected $stmh;

	public function __construct()
	{
		$this->connect();
	}

	public function connect()
	{
		$this->dbh = Database::getInstance();
		return $this->dbh;
	}


	public function query($sql, array $params)
	{
		$this->stmh = $this->dbh->prepare($sql);
		$this->stmh->execute($params);

		$results = [];
		while($row = $this->stmh->fetch(PDO::FETCH_ASSOC)) {
			$results[] = $row;
		}

		return $results;
	}

	public function __get($name)
	{
		return $this->_attributes[$name];
	}

	public function __set($name, $value)
	{
		if(is_array($this->_attributes[$name])) {
			$this->_attributes[$name][] = $value;
		} else {
			$this->_attributes[$name] = $value;
		}
		
	}

	public function save()
	{
		$container = self::getColonKeys($this->_attributes);
		$query = 'INSERT INTO ' . static::$table . ' (' . implode(',', $container->keys) . ') VALUES (' . implode(',', $container->keysWithColons). ');';

		return $this->query($query, array_combine($container->keysWithColons, $container->values));
	}

	public function getLastInsertID()
	{
		return $this->dbh->lastInsertID();
	}

	public static function getColonKeys(array $array)
	{
		$container = new stdClass();
		$container->keys = array_keys($array);
		$container->values = array_values($array);
		$container->keysWithColons = preg_filter('/^/', ':', $container->keys);
		return $container;
	}

	public static function isAssoc($arr)
	{
		return array_keys($arr) !== range(0, count($arr) - 1);
	}
}
