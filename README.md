# LaporGraf

## Introduction

Situs web ini adalah platform yang didedikasikan untuk memfasilitasi pengaduan, memberikan saran, serta menyampaikan kritikan di antara warga Grafika. Dengan menyediakan wadah untuk berbagi pendapat, bertujuan untuk membangun lingkungan yang lebih baik dan lebih responsif bagi semua orang yang berada di Grafika.

Platform pengaduan eksklusif untuk warga SMK Negeri 4 Malang! Sebuah inovasi terkini yang dirancang khusus untuk memfasilitasi kelancaran komunikasi antara siswa, guru, dan staf administrasi sekolah. LaporGraf bertujuan untuk menciptakan lingkungan yang lebih transparan, partisipatif, dan efektif dalam menangani berbagai permasalahan sehari-hari di lingkungan sekolah.

Dengan menggunakan teknologi terkini, LaporGraf memberikan akses cepat dan mudah untuk mengajukan pengaduan, memberikan umpan balik, dan memantau perkembangan tindak lanjut. Kami berkomitmen untuk meningkatkan pengalaman seluruh komunitas SMK Negeri 4 Malang dengan menyediakan sarana yang efisien dan terintegrasi.

Apakah Anda menghadapi masalah akademis, permasalahan lingkungan, atau pun kendala teknis, LaporGraf hadir untuk mendengarkan dan memberikan solusi terbaik. Kami yakin bahwa kolaborasi antara pihak sekolah dan warganya adalah kunci keberhasilan pendidikan. Mari bergabung dalam menciptakan lingkungan belajar yang lebih baik dan responsif di SMK Negeri 4 Malang melalui LaporGraf!

## Installation

This application uses the Codeigniter 3 Framework

### Step 1: Clone the Repository

```bash
git clone https://github.com/ahmdims/LaporGraf
cd LaporGraf
```

### Step 2: Configure the Database

Open the `application/config/database.php` file and update the database connection settings:

```dotenv
$db['default'] = array(
	'dsn' => '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'laporgraf',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

### Step 3: Start the Development Server

```bash
php artisan serve
```

Your LaporGraf application should now be up and running. You can access it at `http://localhost/laporgraf`.

### Step 4: Tes Login

```bash
Email: admin@example.com
Password: 12345678
```
