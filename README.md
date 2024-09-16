## Installation Guide

### a. **System Requirements**
- **Web Server**: Apache atau Nginx
- **PHP**: Versi 8.2.0 atau lebih baru
- **Database**: MySQL atau database relasional lain yang didukung
- **Composer**: Untuk mengelola dependencies

### b. **Installation Steps**

1. **Clone Repository**
   Clone repository:
   ```bash
   git clone https://github.com/username/library-management.git
   cd library-management
2. **Install Dependencies**
    Install semua dependencies PHP dengan Composer:
    ```bash
    composer install
3. **Configure Environment** 
    Edit file `.env` dan cocokkan dengan konfigurasi Database:
    ```ini
    database.default.hostname = localhost
    database.default.database = your_database_name
    database.default.username = your_database_username
    database.default.password = your_database_password
4. **Database Konfigurasi**
    Copy dan Paste Query yang ada di file `database`.
5. Jalan Aplikasinya: http://localhost/nama_project/public.


## Pengujian Menggunakan API Menggunakan POSTMAN

1. **Postman**: Pastikan aplikasi Postman sudah terpasang. Atau dapat diunduh [sini](https://www.postman.com/downloads/).
2. **Server**: Pastikan server CodeIgniter 4 Anda berjalan.


### Authors (Penulis)

1. **GET /api/authors**
   - **Deskripsi**: Mendapatkan daftar semua penulis.
   - **Metode**: `GET`
   - **URL**: `http://localhost/nama_project/public/authors`
   - **Contoh Respons**:
     ```json
     [
       {
         "id": 1,
         "name": "J.K. Rowling",
         "bio": "Penulis seri Harry Potter",
         "birth_date": "1965-07-31"
       },
       {
         "id": 2,
         "name": "George R.R. Martin",
         "bio": "Penulis A Song of Ice and Fire",
         "birth_date": "1948-09-20"
       }
     ]
     ```

2. **GET /api/authors/{id}**
   - **Deskripsi**: Mendapatkan detail penulis berdasarkan ID.
   - **Metode**: `GET`
   - **URL**: `http://localhost/nama_project/public/authors/1`
   - **Contoh Respons**:
     ```json
     {
       "id": 1,
       "name": "J.K. Rowling",
       "bio": "Penulis seri Harry Potter",
       "birth_date": "1965-07-31"
     }
     ```

3. **POST /api/authors**
   - **Deskripsi**: Menambahkan penulis baru.
   - **Metode**: `POST`
   - **URL**: `http://localhost/nama_project/public/authors`
   - **Body (raw JSON)**:
     ```json
     {
       "name": "Tolkien",
       "bio": "Penulis The Lord of the Rings",
       "birth_date": "1892-01-03"
     }
     ```

4. **PUT /api/authors/{id}**
   - **Deskripsi**: Memperbarui informasi penulis yang ada.
   - **Metode**: `PUT`
   - **URL**: `http://localhost/nama_project/public/authors/1`
   - **Body (raw JSON)**:
     ```json
     {
       "name": "J.K. Rowling",
       "bio": "Penulis asal Inggris, terkenal dengan seri Harry Potter.",
       "birth_date": "1965-07-31"
     }
     ```

5. **DELETE /api/authors/{id}**
   - **Deskripsi**: Menghapus penulis berdasarkan ID.
   - **Metode**: `DELETE`
   - **URL**: `http://localhost/nama_project/public/authors/1`


### Books (Buku)

1. **GET /api/books**
   - **Deskripsi**: Mendapatkan daftar semua buku.
   - **Metode**: `GET`
   - **URL**: `http://localhost/nama_project/public/books`
   - **Contoh Respons**:
     ```json
     [
       {
         "id": 1,
         "title": "Harry Potter and the Philosopher's Stone",
         "description": "Buku pertama dari seri Harry Potter",
         "publish_date": "1997-06-26",
         "author_id": 1
       },
       {
         "id": 2,
         "title": "A Game of Thrones",
         "description": "Buku pertama dari seri A Song of Ice and Fire",
         "publish_date": "1996-08-06",
         "author_id": 2
       }
     ]
     ```

2. **GET /api/books/{id}**
   - **Deskripsi**: Mendapatkan detail buku berdasarkan ID.
   - **Metode**: `GET`
   - **URL**: `http://localhost/nama_project/public/books/1`
   - **Contoh Respons**:
     ```json
     {
       "id": 1,
       "title": "Harry Potter and the Philosopher's Stone",
       "description": "Buku pertama dari seri Harry Potter",
       "publish_date": "1997-06-26",
       "author_id": 1
     }
     ```

3. **POST /api/books**
   - **Deskripsi**: Menambahkan buku baru.
   - **Metode**: `POST`
   - **URL**: `http://localhost/nama_project/public/books`
   - **Body (raw JSON)**:
     ```json
     {
       "title": "The Hobbit",
       "description": "Novel fantasi",
       "publish_date": "1937-09-21",
       "author_id": 3
     }
     ```

4. **PUT /api/books/{id}**
   - **Deskripsi**: Memperbarui informasi buku yang ada.
   - **Metode**: `PUT`
   - **URL**: `http://localhost/nama_project/public/books/1`
   - **Body (raw JSON)**:
     ```json
     {
       "title": "Harry Potter and the Philosopher's Stone",
       "description": "Deskripsi diperbarui",
       "publish_date": "1997-06-26",
       "author_id": 1
     }
     ```


5. **DELETE /api/books/{id}**
   - **Deskripsi**: Menghapus buku berdasarkan ID.
   - **Metode**: `DELETE`
   - **URL**: `http://localhost/nama_project/public/books/1`


### Association (Asosiasi)

1. **GET /api/authors/{id}/books**
   - **Deskripsi**: Mendapatkan semua buku yang ditulis oleh penulis tertentu.
   - **Metode**: `GET`
   - **URL**: `http://localhost/nama_project/public/authors/1/books`
   - **Contoh Respons**:
     ```json
     [
       {
         "id": 1,
         "title": "Harry Potter and the Philosopher's Stone",
         "description": "Buku pertama dari seri Harry Potter",
         "publish_date": "1997-06-26",
         "author_id": 1
       }
     ]
     ```
