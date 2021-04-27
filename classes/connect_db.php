<?php

class DatabaseObj
{
	private $servername;
	private $database;
	private $username;
	private $password;
	private $conn;
	private $ssl;

	function __construct() {

		$this->servername = "db-prd-1-studev-1.mysql.database.azure.com";
		$this->username = "s031080j@db-prd-1-studev-1";
		$this->database = "s031080j";
		$this->password = "8cPuwisb32";
		$this->ssl = "BaltimoreCyberTrustRoot.crt.cer";

	}

	function connect() {

		$this->conn = mysqli_init();
		mysqli_ssl_set($this->conn, NULL, NULL, $this->ssl, NULL, NULL);
		mysqli_real_connect($this->conn, $this->servername, $this->username, $this->password, $this->database, 3306, MYSQLI_CLIENT_SSL);
		if (mysqli_connect_errno($this->conn)) {
			die('Failed to connect to MySQL: '.mysqli_connect_error());
		}
	}

	function disconnect() {
		mysqli_close($this->conn);

	}

	function getCo() {
		return $this->conn;
	}

}


?>