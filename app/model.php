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
		$this->_attributes[$name] = $value;
	}

	public function save()
	{
		$keys = array_keys($this->_attributes);
		$values = array_values($this->_attributes);
		$colonKeys = preg_filter('/^/', ':', $keys);
		$query = 'INSERT INTO ' . static::$table . ' (' . implode(',', $keys) . ') VALUES (' . implode(',', $colonKeys). ');';

		var_dump($query);
		return $this->query($query, array_combine($colonKeys, $values));
	}
	
	public function getLastInsertID()
	{
		return $this->dbh->lastInsertID();
	}
}
