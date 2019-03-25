<?php
define('DB_HOST', "127.0.0.1");
define('DB_USER', "root");
define('DB_PWD', "123456");
define('DB_NAME', 'slimtest');

global $conn;

function connect() {
	$conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "数据库连接错误: " . mysqli_connect_error();
	}
	return $conn;
}

class DBHandle {
	public $conn;
	function __construct() {
		$this->conn = connect();
	}

	public function getUserList() {
		$sql = "SELECT * FROM user";
		$rs = $this->conn->query($sql);
		$users = $rs->fetch_all(MYSQLI_ASSOC);
		return $users;
	}

	public function getUser($id) {
		$sql = "SELECT * FROM user WHERE `id`='$id'";
		$rs = $this->conn->query($sql);
		$user = $rs->fetch_array(MYSQLI_ASSOC);
		return $user;
	}

	public function createUser($user) {
		$sql = "insert into user(name, gender, age, job) VALUES('$user[name]','$user[gender]','$user[age]','$user[job]')";
		$rs = $this->conn->query($sql);
		$last_userid = $this->conn->insert_id;
		if (!empty($last_userid)) {
			return $last_userid;
		} else {
			return;
		}
	}

	public function updateUser($user) {
		$sql = "update user SET name='$user[name]', gender='$user[gender]',age='$user[age]',job='$user[job]' WHERE id='$user[id]'";
		$rs = $this->conn->query($sql);
		$affected_userid = $this->conn->affected_rows;
		if (!empty($affected_userid)) {
			return $user;
		} else {
			return;
		}
	}

	public function deleteUser($user) {
		$sql = "DELETE FROM user WHERE id='$user[id]'";
		$rs = $this->conn->query($sql);
		$affected_userid = $this->conn->affected_rows;
		if (!empty($affected_userid)) {
			return $affected_userid;
		} else {
			return;
		}
	}
}