<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use CodeIgniter\RESTful\ResourceController;

class AuthorsController extends ResourceController
{
    protected $modelName = 'App\Models\AuthorModel';
    protected $format    = 'json';



    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Author not found');
        }
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'bio' => $this->request->getVar('bio'),
            'birth_date' => $this->request->getVar('birth_date')
        ];

        if ($this->model->insert($data)) {
            return $this->respondCreated(['message' => 'Data Author Created!']);
        } else {
            return $this->failValidationErrors($this->model->validation->getErrors());
        }
    }


    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'bio' => $this->request->getVar('bio'),
            'birth_date' => $this->request->getVar('birth_date')
        ];

        $author = $this->model->find($id);
        if (!$author) {
            return $this->failNotFound('Author not found');
        }

        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Data Author Updated!']);
        } else {
            return $this->failValidationErrors($this->model->validation->getErrors()); 
        }
    }

    public function delete($id = null)
    {
        $author = $this->model->find($id);
        if (!$author) {
            return $this->failNotFound('Author not found');
        }
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Author deleted successfully']);
        } else {
            return $this->failServerError('Failed to delete author');
        }
    }

    public function getBooks($id = null)
    {
        $author = $this->model->find($id);
        if ($author) {
            $books = $this->model->getBooksByAuthor($id);
            return $this->respond($books);
        } else {
            return $this->failNotFound('Author not found');
        }
    }
}
