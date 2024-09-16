## Installation Guide

### a. **System Requirements**
- **Web Server**: Apache atau Nginx
- **PHP**: Versi 7.4 atau lebih baru
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
5. Jalan Aplikasinya.
