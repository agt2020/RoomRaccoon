<?php

class ErrorController
{
	public static function error($req, $res) {
		return $res->view('errorHandler', [
			'statusCode' => $res->code,
		]);
	}
}