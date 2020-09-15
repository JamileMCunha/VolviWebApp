
<?php
try{
$host ='127.0.0.1';
$dbname = 'volvi';
$user = 'root';
$pass = '';
$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);


$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}