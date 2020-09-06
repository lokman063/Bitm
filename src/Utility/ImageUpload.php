<?php



namespace Bitm\Utility;


class ImageUpload
{
 

function addImage($file){

    $data = null;
    $is_uploaded = false;
    if($file['picture']['size']>0) {
        $target_file = $file['picture']['tmp_name'];
        $filename = time() . "_" . $file['picture']['name'];
        $dest_file = $_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/' . $filename;

        $is_uploaded = move_uploaded_file($target_file, $dest_file);
    }

    if ($is_uploaded){
        $data = $filename;
    }
    else{
        $data = "";
    }
return $data;
}
function updateImage($file,$newOne){
    $is_uploaded = null;
    $data = null;
    
    if($file['picture']['size']>0) {
        $target_file = $file['picture']['tmp_name'];
        $filename = time() . "_" . $file['picture']['name'];
        $dest_file = $_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/' . $filename;

        $is_uploaded = move_uploaded_file($target_file, $dest_file);
    }
    
    if ($is_uploaded){
        if(!empty($_FILES['picture']['name'])){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/'.$newOne);
    
        }
        $data = $filename;
    
    }
    else{
        $data = $newOne;
    }
    return $data;
    


}

        



    
 }

