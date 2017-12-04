<?php
/**
 * Description of Images
 *
 * @author Валерия
 */
class Images {
     
    public static function getImages($dir, $inputname){
       if(!empty($_FILES[$inputname]['name'])){
        if($_FILES[$inputname]['error'] == 0){		 
          $type = $_FILES[$inputname]['type'];					
           if (($type != "image/jpg") && ($type != "image/jpeg") && 
               ($type != "image/png") && ($type != "image/gif")) exit("Wrong type");					
           if(!file_exists($image)){$image = $dir."/".$_FILES[$inputname]['name'];}
           if(file_exists($image)){
               $image = $dir."/".uniqid().$_FILES[$inputname]['name'];
           }
           if(move_uploaded_file($_FILES[$inputname]['tmp_name'], $image)) {
               $image = htmlspecialchars(trim($image));
               $_SESSION['image'] = $image;
           }
        }     					                         
       }
       return $_SESSION['image'];
    }
}
