<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

	public function indexAction() {

	
		if(!empty($_POST['email'])){

			if(!$this->model->checkEmailExists($_POST['email'])) {
				mail($_POST['email'], "Новый пароль", "Ваш новый пароль 111");
				$this->view->message("success", "Ваш новый пароль выслан на почту");
			}else {
				$this->view->message("error", "Данная почта не найдена");
			}
		}

		if(!empty($_POST['login'])){
			if($this->model->auth($_POST['login'], $_POST['pass'])){
				$this->view->location("/");
			}else {
				$this->view->message("error", "Не верный логин или пароль");
			}
		}

		$this->view->render('Главная страница');
	}

}