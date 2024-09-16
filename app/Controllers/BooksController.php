<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\RESTful\ResourceController;

class BooksController extends ResourceController
{
    protected $modelName = 'App\Models\BookModel';
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
            return $this->failNotFound('Book not found');
        }
    }

    public function create()
    {
        // Ambil data dari request
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'publish_date' => $this->request->getVar('publish_date'),
            'author_id' => $this->request->getVar('author_id'),
        ];

        if (!$this->validate([
            'title' => 'required',
            'description' => 'required',
            'publish_date' => 'required|valid_date',
            'author_id' => 'required|is_not_unique[authors.id]',
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        } else {
            return $this->failServerError('Failed to create book');
        }
    }

    public function update($id = null)
    {
        $book = $this->model->find($id);

        if (!$book) {
            return $this->failNotFound('Book not found');
        }

        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'publish_date' => $this->request->getVar('publish_date'),
            'author_id' => $this->request->getVar('author_id')
        ];

        if (!$this->validate([
            'title' => 'required|min_length[3]',
            'description' => 'required',
            'publish_date' => 'required|valid_date',
            'author_id' => 'required|is_not_unique[authors.id]'
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Book updated successfully', 'data' => $data]);
        } else {
            return $this->failServerError('Failed to update book');
        }
    }

    public function delete($id = null)
    {
        $book = $this->model->find($id);

        if (!$book) {
            return $this->failNotFound('Book not found');
        }
        
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Book deleted successfully']);
        }
    }
}
