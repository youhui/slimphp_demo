<?php

require __DIR__ . '/../src/common.php';
require __DIR__ . '/../src/db.php';
require __DIR__ . '/../vendor/autoload.php';

// 创建并配置 Slim app
$app = new \Slim\App;

// 定义 app 路由
$app->get('/books/{id}', function ($request, $response, $args) {
	$data = [
		'time' => time(),
		'code' => 0,
		'data' => [],
	];
	return $response->withJson($data);
});

$app->get('/users', function ($request, $response, $args) {
	$db = new DBHandle();
	$users = $db->getUserList();
	return $response->withJson(formatOutput(true, $users, '请求成功'));
});

// 运行 app
$app->run();
