<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

    public function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        return $s; // возвращаем результат
      }

    public function getUsers()
    {
        $data = $this->db->row('SELECT * FROM users');

        return $data;
    }


    public function getApplications()
    {
        $data1[] = $this->db->row('SELECT * FROM tour');
        $data2[] = $this->db->row('SELECT * FROM users');

        $data = [
            'tour' => $data1,
            'users' => $data2
        ];

        return $data;
    }

    public function getInfo($id)
    {
        $params = [
			'id' => $id
		];

		$data = $this->db->row('SELECT * FROM users WHERE id = :id', $params);
        
        return $data[0];
        
    }

    public function getLenth()
    {
        $data = $this->db->row('SELECT * FROM tour');
        return count($data);
    }

    public function deleteApplication($id)
    {
        $params = [
			'id' => $id
		];

		$data = $this->db->query('DELETE FROM tour WHERE user_id = :id', $params);
    }

    public function getPost()
	{        
        return array_reverse($this->db->row('SELECT * FROM posts'));
    }

    public function getTour()
	{        
        return array_reverse($this->db->row('SELECT * FROM travels'));
    }
    
    public function getOnePost($id)
    {
		$params = [
			'id' => $id
        ];
    
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
    }
    
    public function editPost($post, $id, $img = "")
    {
        $params;
        if($img == ""){
            $params = [
                'id' => $id,
                'title' => ucfirst($post['title']),
                'body' => $post['body'],
            ];
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id', $params);
        }else{
            $params = [
                'id' => $id,
                'title' => ucfirst($post['title']),
                'body' => $post['body'],
                'img' => $this->translit($img)
            ];
            $this->db->query('UPDATE posts SET title = :title, body = :body, img = :img WHERE id = :id', $params);
        }
        
        
    }

    public function newPost($post, $img)
    {
       $params = [
           'id' => null,
           'title' => ucfirst($post['title']),
           'body' => $post['body'],
           'img' => $this->translit($img)
       ];
       $data = $this->db->query('INSERT INTO posts VALUES (:id, :title, :body, :img)', $params);
    }

    public function newTour($post, $img)
    {
        $params = [
            'id' => null,
            'title' => ucfirst($post['title']),
            'body' => $post['body'],
            'img' => $this->translit($img),
        ];
        $data = $this->db->query('INSERT INTO travels VALUES (:id, :title, :body, :img)', $params);
    }

    public function getOneTour($id)
    {
		$params = [
			'id' => $id
        ];
    
		return $this->db->row('SELECT * FROM travels WHERE id = :id', $params);
    }

}