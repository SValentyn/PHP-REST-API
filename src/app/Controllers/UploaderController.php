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

    /**
     * Method POST
     * Upload a new user profile picture by id
     * http://domain/upload
     */
    public function create()
    {
        $id = $this->requestParams['id'];

        $target_dir = "public/images/";
        $fileName = $_FILES['file']['name'];
        $newDataUri = $target_dir . $fileName;

        $connection = (new Connection())->getConnection();

        if (DBUtils::uploadById($connection, $id, $target_dir, $fileName)) {
            return $this->response($newDataUri, 200);
        } else {
            return $this->response("Image cannot be updated..", 500);
        }
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