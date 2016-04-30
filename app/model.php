<?php

class Model
{
	private $servername = 'localhost';
	private $dbname = 'tnsdb';
	private $username = 'root';
	private $password = '----';

	protected $dbh;
	protected $stmh;


	public function __construct() {
		$this->connect();
	}

	public function connect()
	{
		$this->dbh = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

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

}