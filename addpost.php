<?php

include "connect.php" ;


// $stmt = $con->prepare("INSERT INTO post ( post_name , post_image , post_cat , post_user) VALUES ( ? , ?,? ,?)") ;
// $stmt->execute(['1 ' , '1' , '1' , '1']);

        $post 			= filter_var($_POST['post'] , FILTER_SANITIZE_STRING) ;

        $imagename		= filter_var($_POST['imagename'] , FILTER_SANITIZE_STRING) ;

        $image			= base64_decode($_POST['image64']) ;

        $cat 			= filter_var($_POST['cat'] , FILTER_SANITIZE_STRING) ;

        $iduser 		= filter_var($_POST['iduser'] , FILTER_SANITIZE_STRING) ;

        // $xx = $con->prepare( "SELECT  id.* , posr_user.* FROM post INNER JOIN ca ON post.post_user=users.id 
        // 	WHERE post.post_user= ");

        if(!empty($_POST['iduser']) && !empty($_POST['cat'])){
     

        $sql = "INSERT INTO `post` ( `post_name` , `post_image` , `post_cat` , `post_user` ) 
                VALUES                            (:xpost , :ximage , :xcat , :xiduser )"  ;
  
        $stmt = $con->prepare($sql) ;

		$stmt->execute(array(
                     ":xpost"	=>$post ,
					 ":ximage"	=>$imagename ,
				 	 ":xcat"	=>$cat ,
				  	 ":xiduser"	=>$iduser 
											));

		$row 	= $stmt->rowCount() ;

		if($row > 0){
			file_put_contents("UploadImage\\" . $imagename, $image );

			echo json_encode(array(
				   	 "status"   =>"success" ,
				   	 'ximage' =>$imagename ,
				   

				));
		} 
}

?>