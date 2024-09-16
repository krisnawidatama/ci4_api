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
4. Copy dan paste SQL berikut:
    ```sql
    CREATE TABLE `authors` (
        `id` int(11) NOT NULL,
        `name` varchar(255) NOT NULL,
        `bio` text,
        `birth_date` date DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        -- --------------------------------------------------------

        --
        -- Table structure for table `books`
        --

        CREATE TABLE `books` (
        `id` int(11) NOT NULL,
        `title` varchar(255) NOT NULL,
        `description` text,
        `publish_date` date DEFAULT NULL,
        `author_id` int(11) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        --
        -- Indexes for dumped tables
        --

        --
        -- Indexes for table `authors`
        --
        ALTER TABLE `authors`
        ADD PRIMARY KEY (`id`),
        ADD KEY `idx_author_id_join` (`id`);

        --
        -- Indexes for table `books`
        --
        ALTER TABLE `books`
        ADD PRIMARY KEY (`id`),
        ADD KEY `idx_author_id` (`author_id`);

        --
        -- AUTO_INCREMENT for dumped tables
        --

        --
        -- AUTO_INCREMENT for table `authors`
        --
        ALTER TABLE `authors`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        --
        -- AUTO_INCREMENT for table `books`
        --
        ALTER TABLE `books`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        --
        -- Constraints for dumped tables
        --

        --
        -- Constraints for table `books`
        --
        ALTER TABLE `books`
        ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL;
        COMMIT;


