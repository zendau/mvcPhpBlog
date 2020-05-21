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

}