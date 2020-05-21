<?php

namespace application\models;

use application\core\Model;

class User extends Model {


    public function validate($input, $post) {

		$rules = [
			'email' => [
				'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
				'message' => 'E-mail адрес указан неверно',
			],
			'login' => [
				'pattern' => '#^[a-z0-9]{3,15}$#',
				'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 15 символов',
			],
			'desk' => [
				'pattern' => '#^[A-zА-я0-9]{0,1000}$#',
				'message' => 'Описание указано неверно (разрешено до 1000 символов',
			],
			'pass' => [
				'pattern' => '#^[a-z0-9]{10,30}$#',
				'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 10 до 30 символов',

			],
			'name' => [
				'pattern' => '/[^а-яё]/iu',
				'message' => 'Имя указано не верно (разрешено вводить только русские буквы от 2 до 15 символов',
			],
		];

		foreach ($input as $val) {
			if (!preg_match($rules[$val]['pattern'], $post[$val])) {
				return ["error", $rules[$val]['message']];
			}
		}

		return true;
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

	public function checkLoginExists($login) {
		$params = [
			'login' => $login,
		];
		if ($this->db->column('SELECT id FROM users WHERE login = :login', $params)) {
			$this->error = 'Этот логин уже используется';
			return false;
		}
		return true;
	}

	public function register($post) {

		if(empty($post['cbtn1'])) {
			$post['cbtn1'] = "";
		}
		if(empty($post['cbtn2'])) {
			$post['cbtn2'] = "";
		}
		if(empty($post['cbtn3'])) {
			$post['cbtn3'] = "";
		}
		if(empty($post['cbtn4'])) {
			$post['cbtn4'] = "";
		}
		if(empty($post['description'])){
			$post['description'] = "";
		}

		$params = [
			'id' => null,
			'login' => $post['login'],
			'email' => $post['email'],
			'name' => $post['name'],
			'password' => $post['pass'],
			'date_reg' => date("j, n, Y"),
			'phone' => $post['phone'],
			'goals' => "$post[cbtn1] $post[cbtn2] $post[cbtn3] $post[cbtn4]",
			'skill' => $post['rbtn'],
			'description' => $post['desk']
		];
		$this->db->query('INSERT INTO users VALUES (:id, :login, :email, :name, :password, :date_reg, :phone, :goals, :skill, :description)', $params);
		
		$params = [
			'login' => $post['login'],
		];

		$_SESSION['authorize']['id'] = $this->db->column('SELECT id FROM users WHERE login = :login', $params);

	}

	public function addTour($date, $tour)
	{
		$params = [
			'id' => $_SESSION['authorize']['id'],
		];

		if($this->db->column('SELECT * FROM tour WHERE user_id = :id', $params)) {
			$this->error = 'Вы уже купили тур, ожидайте ответа';
			return false;
		}

		$params = [
			'user_id' => $_SESSION['authorize']['id'],
			'tour_id' => $tour,
			'date' => $date
		];

		$this->db->query('INSERT INTO tour VALUES (:user_id, :tour_id, :date)', $params);

		return true;
	}

	public function getPost()
	{        
        return array_reverse($this->db->row('SELECT * FROM posts'));
	}

	public function getOnePost($id)
	{
		$params = [
			'id' => $id
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}

	public function getTour()
	{        
        return array_reverse($this->db->row('SELECT * FROM travels'));
	}

	public function getOneTour($id)
	{
		$params = [
			'id' => $id
		];
		return $this->db->row('SELECT * FROM travels WHERE id = :id', $params);
	}

	public function getNumPost(){

		$data = $this->db->row('SELECT * FROM posts');
		return count($data);
	}

}