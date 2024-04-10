<?php
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
  die("Connection Failed:" . mysqli_connect_error());
}

date_default_timezone_set('Asia/Jakarta');
