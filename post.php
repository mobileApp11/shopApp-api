<?php


include "connect.php";

$cat = $_POST['cat'] ;

$sql =  "SELECT post.* , users.* , category.* FROM post

INNER JOIN users ON post.post_user = users.id  
INNER JOIN category ON post.post_cat = category.cat_id  WHERE 
     post.post_cat = ? " ;



$stmt = $con->prepare($sql) ;

$stmt->execute(array($cat)) ;

$poste = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

echo json_encode($poste);