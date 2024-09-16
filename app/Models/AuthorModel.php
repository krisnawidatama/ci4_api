<?php
namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table      = 'authors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'bio', 'birth_date'];

    public function getBooksByAuthor($author_id)
    {
        return $this->db->table('books')->where('author_id', $author_id)->get()->getResult();
    }
}
