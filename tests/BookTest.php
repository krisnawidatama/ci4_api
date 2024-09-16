<?php namespace App\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\BookModel;

class BookTest extends CIUnitTestCase
{
    protected $bookModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bookModel = new BookModel();
    }

    public function testCreateBook()
    {
        $data = ['title' => 'Book Title', 'description' => 'A great book', 'publish_date' => '2024-01-01', 'author_id' => 1];
        $this->bookModel->save($data);
        $this->assertNotEmpty($this->bookModel->findAll());
    }

    public function testRetrieveBook()
    {
        $book = $this->bookModel->find(1);
        $this->assertArrayHasKey('title', $book);
    }

    public function testUpdateBook()
    {
        $data = ['id' => 1, 'title' => 'Updated Title'];
        $this->bookModel->save($data);
        $updatedBook = $this->bookModel->find(1);
        $this->assertEquals('Updated Title', $updatedBook['title']);
    }

    public function testDeleteBook()
    {
        $this->bookModel->delete(1);
        $this->assertEmpty($this->bookModel->find(1));
    }
}
