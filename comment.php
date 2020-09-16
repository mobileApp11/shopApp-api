<?php

include "connect.php";

$comment = $_POST['comment'] ; 
$imgname = $_POST['imgname'] ; 
$userid = $_POST['iduser'] ; 
$postid = $_POST['idpost'] ; 
$image= base64_decode($_POST['image64']) ;

 if(!empty($_POST['iduser']) && !empty($_POST['idpost'])){

$sql = "INSERT INTO `comment` (`comment` , `com_img` , `com_userid` , `com_postid`)
        VALUES  (:comment , :imgname , :userid  , :postid ) " ; 

$stmt = $con->prepare($sql) ;

$stmt->execute(array(

":comment" => $comment,
":imgname" => $imgname,
":userid" => $userid,
":postid" => $postid,


));

	$row 	= $stmt->rowCount() ;

	if($row > 0){
			file_put_contents("UploadImage\\" . $imgname, $image );

			echo json_encode(array(
				   	 "status"   =>"success" ,
				   	 'imgname' =>$imgname ,
				   

				));
		} 
}

?>