<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

$freela = "";
$dsn = 'mysql:dbname=mporn;host=localhost';
$user = 'root';
$password = '';

if (isset($_POST['id_freelancer'])){
    $freela = $_POST['id_freelancer'];
    
} else {
    echo json_encode(['resultado' => false]);
    exit;
}

try{
    $conn = new PDO($dsn, $user, $password);
    $query = "Select * from freelancer where id_freelancer = {$freela}";
    
    $result = $conn->query($query);
    
    if($result) {
        while ($row = $result->fetch(PDO::FETCH_OBJ)){
            echo json_encode($row);
        }
    }
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false]);
}

$conn = null;

exit;