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

$app->get('/users/{id}', function ($request, $response, $args) {
	$id = $request->getAttribute('id');
	$db = new DBHandle();
	$user = $db->getUser($id);
	return $response->withJson(formatOutput(true, $user, '请求成功'));
});

$app->post('/users', function ($request, $response, $args) {
	$body = $request->getParsedBody();
	$db = new DBHandle();
	$status = $db->createUser($body);
	if ($status) {
		return $response->withJson(formatOutput(true, $status, '用户添加成功'));
	} else {
		return $response->withJson(formatOutput(false, $status, '用户添加失败'));
	}
});

$app->put('/users', function ($request, $response, $args) {
	$body = $request->getParsedBody();
	$db = new DBHandle();
	$status = $db->updateUser($body);
	if ($status) {
		return $response->withJson(formatOutput(true, $status, '用户修改成功'));
	} else {
		return $response->withJson(formatOutput(false, $status, '用户修改失败'));
	}
});

$app->delete('/users', function ($request, $response, $args) {
	$body = $request->getParsedBody();
	$db = new DBHandle();
	$status = $db->deleteUser($body);
	if ($status) {
		return $response->withJson(formatOutput(true, $status, '用户删除成功'));
	} else {
		return $response->withJson(formatOutput(false, $status, '用户删除失败'));
	}
});

// 运行 app
$app->run();
