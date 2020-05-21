<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class UserController extends Controller {

	public function newsAction() {



		if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK)
		{
			$name = $_FILES['filename']['name'];
			move_uploaded_file($_FILES['filename']['tmp_name'], 'public/img/news/'.$name);
		}

		$num_post = $this->model->getNumPost();

        $test = new Pagination($num_post, 5, $this->model->getPost(), $this->route['num']); 
		
		if(!empty($_POST)){
			exit(json_encode($this->model->getPost()));
		}

		if($test->createPost() == "404") {
			$this->view->errorCode(404);
		}

		$var = [
			'data' => $this->model->getPost(),
			'test' => $test->createPost(),
			'page' => $test->createPagination()
		];
		$this->view->render('Новости', $var);
    }
    
    public function postAction() {
		$var = [
			'data' => $this->model->getOnePost($this->route["page"])
		];
		$this->view->render('Новость', $var);
	}

	public function regAction() {

		if(!empty($_POST)){
			 if(!$this->model->checkEmailExists($_POST['email'])){
			 	$this->view->message('error', $this->model->error);
			 }
			 if(!$this->model->checkLoginExists($_POST['login'])){
			 	$this->view->message('error', $this->model->error);
			 }
			
			$res_val = $this->model->validate(['login', 'email', 'pass'], $_POST);
			if($res_val[0] =="error"){
				$this->view->message("error", $res_val[1]);
			}
			$this->model->register($_POST);
			$this->view->location("/");

		}

		$this->view->render('Регистрация');
	}

	public function tourAction() {


		$data = $this->model->getOneTour($this->route["id"]);

		$var = [
			'data' => $data,
		];

		if(!empty($_POST)) {
			
			if($this->model->addTour($_POST['date'], $_POST['title'])){
				$this->view->message("success", "show");
			}else {
				$this->view->message('error', "showError");
			}
			
		}

		$this->view->render("Выбор тура", $var);
	}

	public function logoutAction() {

		session_destroy();

		$this->view->redirect("/");
	}

	public function choiceAction() {

		$var = [
			'data' => $this->model->getTour(),
		];
		$this->view->render("Выбор тура", $var);
	}

}