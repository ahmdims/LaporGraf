# LaporGraf

## Introduction

Situs web ini adalah platform yang didedikasikan untuk memfasilitasi pengaduan, memberikan saran, serta menyampaikan kritikan di antara warga Grafika. Dengan menyediakan wadah untuk berbagi pendapat, bertujuan untuk membangun lingkungan yang lebih baik dan lebih responsif bagi semua orang yang berada di Grafika.

Platform pengaduan ini eksklusif untuk warga SMK Negeri 4 Malang. Sebuah inovasi terkini yang dirancang khusus untuk memfasilitasi kelancaran komunikasi antara siswa, guru, dan staf administrasi sekolah. LaporGraf bertujuan untuk menciptakan lingkungan yang lebih transparan, partisipatif, dan efektif dalam menangani berbagai permasalahan sehari-hari di lingkungan sekolah.

## Installation

This application uses the Codeigniter 3 Framework

### Step 1: Clone the Repository

```bash
git clone https://github.com/ahmdims/laporgraf
cd laporgraf
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Configure the Database

Open the `application/config/database.php` file and update the database connection settings:

```dotenv
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'laporgraf',
	'dbdriver' => 'mysqli',
    // ...
);
```

### Step 4: Configure the Application

1. **Base URL**: Open the file `application/config/config.php`. Adjust the value of `$config['base_url']` according to your project URL on the local server.

   ```php
   $config['base_url'] = 'http://localhost/laporgraf/';
   ```

2. **Composer Autoload**: In the same file (`application/config/config.php`), find the line `$config['composer_autoload']` and set its value to `TRUE` to automatically load libraries from Composer.

   ```php
   $config['composer_autoload'] = TRUE;
   ```

### Step 5: Run the Application

1. Make sure your **Apache** and **MySQL** servers are running (e.g., through XAMPP Control Panel).
2. Open your browser and access the URL you set in `base_url`, for example: **[http://localhost/LaporGraf](http://localhost/laporgraf)**

Your LaporGraf application is now ready to use. You can access it at `http://localhost/laporgraf`.

### Step 6: Tes Login

```bash
Email: admin@example.com
Password: 12345678
```
