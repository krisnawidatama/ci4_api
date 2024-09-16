<?php namespace App\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\AuthorModel;

class AuthorTest extends CIUnitTestCase
{
    protected $authorModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authorModel = new AuthorModel();
    }

    public function testCreateAuthor()
    {
        $data = ['name' => 'John Doe', 'bio' => 'An author', 'birth_date' => '1980-01-01'];
        $this->authorModel->save($data);
        $this->assertNotEmpty($this->authorModel->findAll());
    }

    public function testRetrieveAuthor()
    {
        $author = $this->authorModel->find(1);
        $this->assertArrayHasKey('name', $author);
    }

    public function testUpdateAuthor()
    {
        $data = ['id' => 1, 'name' => 'Jane Doe'];
        $this->authorModel->save($data);
        $updatedAuthor = $this->authorModel->find(1);
        $this->assertEquals('Jane Doe', $updatedAuthor['name']);
    }

    public function testDeleteAuthor()
    {
        $this->authorModel->delete(1);
        $this->assertEmpty($this->authorModel->find(1));
    }
}
