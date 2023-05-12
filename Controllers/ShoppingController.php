<?php

class ShoppingControllers
{
    public static function index($req, $res) {
		$shopping = (new Shopping())->all();
                $result = '';
                foreach($shopping AS $key => $value)
                {
                        $result .= '<li>' . $value . '</li>';
                }
		return $res->view('index', ['result' => $result]);
	}

	public static function insert($req, $res) {
            $shopping = new Shopping();
            try {
                    $id = $shopping->save($req->post);
                    return json_encode(['id'=>$id]);
            } catch (\Throwable $th) {
                    $res->redirect('/',200);
            }
    }
    public static function update($req, $res) {
            $shopping = new Shopping();
            try {
                    $id = $shopping->update($req->post['id'],$req->post);
                    return json_encode(['id'=>$id]);
            } catch (\Throwable $th) {
                    $res->redirect('/',200);
            }
    }

	public static function delete($req, $res) {
		$shopping = new Shopping();
            try {
                    $id = $shopping->delete($req->post['id']);
                    return json_encode(['Deleted']);
            } catch (\Throwable $th) {
                    $res->redirect('/',200);
            }
	}
}