<?php


namespace app\Controllers;


class UploaderController extends BasicController
{

    protected function index()
    {
        $this->response("Action unsupported", 404);
    }

    protected function view()
    {
        $this->response("Action unsupported", 404);
    }

    public function create()
    {
        $id = $this->requestParams['id'];
//        $file = $this->requestParams['file'];

        $target_dir = "public/images/";
        $fileName  = $_FILES['file']['name'];
        file_get_contents($_FILES['file']['tmp_name']);

        $connection = (new Connection())->getConnection();
        return $this->response(DBUtils::uploadById($connection, $id, $target_dir, $fileName));
    }

    protected function update()
    {
        $this->response("Action unsupported", 404);
    }

    protected function delete()
    {
        $this->response("Action unsupported", 404);
    }
}