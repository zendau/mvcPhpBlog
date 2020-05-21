<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'user/news/{num:\d+}' => [
		'controller' => 'user',
		'action' => 'news',
	],

	'user/post/{page:\d+}' => [
		'controller' => 'user',
		'action' => 'post',
	],

	'user/reg' => [
		'controller' => 'user',
		'action' => 'reg',
	],

	'user/tour/{id:\d+}' => [
		'controller' => 'user',
		'action' => 'tour',
	],

	'user/logout' => [
		'controller' => 'user',
		'action' => 'logout',
	],

	'user/choice' => [
		'controller' => 'user',
		'action' => 'choice',
	],

	'admin/users' => [
		'controller' => 'admin',
		"action" => 'users'
	],

	'admin/posts' => [
		'controller' => 'admin',
		"action" => 'posts'
	],

	'admin/applications' => [
		'controller' => 'admin',
		"action" => 'applications'
	],

	'admin/info/{id:\d+}' => [
		'controller' => 'admin',
		"action" => 'info'
	],

	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		"action" => 'edit'
	],

	'admin/new' => [
		'controller' => 'admin',
		"action" => 'new'
	],

	'admin/tourNew' => [
		'controller' => 'admin',
		"action" => 'tourNew'
	],

	'admin/tourEdit' => [
		'controller' => 'admin',
		"action" => 'tourEdit'
	],

	'admin/tourSetting/{id:\d+}' => [
		'controller' => 'admin',
		"action" => 'tourSetting'
	],
	
];