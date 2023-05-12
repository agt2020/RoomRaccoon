<?php

// namespace Controllers;

class ShoppingControllers
{
    public static function index($req, $res) {
		$shopping = (new Shopping())->all();
		return $res->view('shopping', [
			'name' => 'Philip'
		]);
	}

	public static function insert($req, $res) {
		$res->redirect('/');
	}
	public static function update($req, $res) {
		$res->redirect('/');
	}
	public static function delete($req, $res) {
		$res->redirect('/');
	}
}