<?php

include "connect.php" ;

$sql = "SELECT * FROM category " ;

$stmt = $con->prepare($sql) ;

$stmt->execute() ;

$cat = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

echo json_encode($cat);