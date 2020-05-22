<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller {

	public function usersAction() {
        $this->view->layout = "admin";

        $users = $this->model->getUsers();

        $vars = [
			'users' => $users,
		];

		$this->view->render("Пользователи", $vars);
    }
    
    public function postsAction() {

        $this->view->layout = "admin";

        
        $var = [
			'data' => $this->model->getPost()
		];
		$this->view->render("Посты", $var);
    }
    
    public function applicationsAction() {

        if(!empty($_POST['num'])) {
            $data = $this->model->getLenth();
            exit(json_encode($data));
        }
        if(!empty($_POST['delete'])) {
            $this->model->deleteApplication($_POST['delete']);
            exit();
        }
        
        $this->view->layout = "admin";

        $vars = $this->model->getApplications();

		$this->view->render("Заявки", $vars);
    }
    
    public function infoAction() {
        $this->view->layout = "admin";
        
        $vars = $this->model->getInfo($this->route["id"]);

		$this->view->render("Информация об пользователе", $vars);
    }
    
    public function newAction() {


        $img = "";
        if ($_FILES && $_FILES['img']['error']== UPLOAD_ERR_OK)
		{
            $name = $_FILES['img']['name'];
            $img = $name;
			move_uploaded_file($_FILES['img']['tmp_name'], 'public/img/news/'.$this->model->translit($name));
		}

        if(!empty($_POST)){
            $this->model->newPost($_POST, $img);
            $this->view->location("/admin/posts");
        }

        $this->view->layout = "admin";
		$this->view->render("Создание нового поста");
    }
    
    public function editAction() {

        $img = "";
        if ($_FILES && $_FILES['img']['error']== UPLOAD_ERR_OK)
		{
            $name = $_FILES['img']['name'];
            $img = $name;
			move_uploaded_file($_FILES['img']['tmp_name'], 'public/img/news/'.$name);
		}

        if(!empty($_POST)){
            $this->model->editPost($_POST, $this->route["id"], $img);
            $this->view->location("/admin/edit/".$this->route["id"]);
        }

        $this->view->layout = "admin";

        $var = [
			'data' => $this->model->getOnePost($this->route["id"])
        ];
        
		$this->view->render("Редактирование поста", $var);
    }
    
    public function tourNewAction() {

        if(!empty($_POST)){

            $img = "";
            $i = 0;
            foreach ($_FILES['img']['name'] as $key => $value) {
                $img.=$value.' ';
                move_uploaded_file($_FILES['img']['tmp_name'][$i], 'public/img/tour/'.$this->model->translit($value));
                $i++;
            }

            $this->model->newTour($_POST, $img);
            $this->view->location("/admin/tourEdit");
        }

        $this->view->layout = "admin";
        $this->view->render("Создание тура");

    }

    public function tourEditAction()
    {
        $this->view->layout = "admin";
        
        $var = [
			'data' => $this->model->getTour()
		];

        $this->view->render("Редактирование туров", $var);
    }

    public function tourSettingAction()
    {
        if(!empty($_POST)){
            
            $img = "";
            $i = 0;
            foreach ($_FILES['img']['name'] as $key => $value) {
                $img.=$value.' ';
                move_uploaded_file($_FILES['img']['tmp_name'][$i], 'public/img/tour/'.$value);
                $i++;
            }

            $this->model->SetTour($_POST, $this->route["id"], $img);
            $this->view->location("/admin/edit/".$this->route["id"]);

        }

        $var = [
			'data' => $this->model->getOneTour($this->route["id"])
        ];

        $this->view->layout = "admin";
        $this->view->render("Редактирование туров", $var);
    }

}