<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class GiftsController extends ResourceController
{
    protected $modelName = 'App\Models\GiftsModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'gifts' => $this->model->paginate(5),
            // 'pager' => $this->model->pager,
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data == null) {
            return $this->failNotFound("Gifts not found");
        }

        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = json_decode(file_get_contents("php://input"));

        $insert = $this->model->insert($data);

        if (!$insert) {
            $response = [
                'message' => $this->model->errors()
            ];

            return $this->failValidationErrors($response);
        }

        $response = [
            'message' => 'Success create new data'
        ];

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = json_decode(file_get_contents("php://input"));

        $update = $this->model->update($id, $data);

        if (!$update) {
            $response = [
                'message' => $this->model->errors()
            ];

            return $this->failValidationErrors($response);
        }

        $dataUpdate = $this->model->find($id);
        return $this->respond($dataUpdate, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
