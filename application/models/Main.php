<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function auth($login, $password) {
		$params = [
			'login' => $login,
		];
		$result = $this->db->row('SELECT * FROM users WHERE login = :login', $params);

		if(!empty($result)) {
			if($result[0]["password"] == $password){
				$_SESSION['authorize'] = $result[0];
				if($result[0]['login'] == "admin") {
					$_SESSION['admin'] = true;
				}
				return true;
			}
		} 
		
		
		return false;
	}

	public function checkEmailExists($email) {
        
        $params = [
			'email' => $email,
		];
		if ($this->db->column('SELECT id FROM users WHERE email = :email', $params)) {
			$this->error = 'Данная почта уже занята';
			return false;
		}
		return true;
	}

	public function newPass($email) {
		$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
		$length = intval(10);
		$size=strlen($chars)-1;
		$password = "";
		$length = 10;
		while($length--) {
			$password.=$chars[rand(0,$size)];
		} 

		$params = [
			'pass' => $password,
			'email' => $email,
		];

		$this->db->query("UPDATE users set password = :pass WHERE email = :email", $params);

		return $password;

	}

}