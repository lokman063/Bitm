<?php
namespace Bitm\Product;
use Bitm\Db\Db;
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use PDO;

class Product
{
public $id = null;
public $title = null;
public $picture = null;
public $link = null;
public $promotional_message = null;
public $html_banner = null;
public $is_active = null;
public $is_draft = null;
public $is_deleted = 0;
public $created_at = null;
public $modified_at = null;
public $conn = null;

function __construct(){
$this->conn = Db::connect();

}


function all(){

    //selection query
//$query = "SELECT * FROM products WHERE is_deleted = 0 ORDER BY id DESC ";
 $query = "SELECT * FROM products ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function active(){


$query = "SELECT * FROM products WHERE is_active = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $products = $sth->fetchAll(PDO::FETCH_ASSOC);
}
function inactive(){


$query = "SELECT * FROM products WHERE is_active = 0 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $products = $sth->fetchAll(PDO::FETCH_ASSOC);
}

function trash(){


$query = "SELECT * FROM products WHERE is_deleted = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $products = $sth->fetchAll(PDO::FETCH_ASSOC);
}


function restore($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE products SET  is_deleted = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
function activate($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE products SET  is_active = 1 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
function deactivate($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE products SET  is_active = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}

function store($data){

        $this->prepare($data);

    $query = "INSERT INTO `products` (
    `id`, 
    `title`,
    `picture`, 
    `link`, 
    `promotional_message`, 
    `html_banner`,
    `is_active`, 
    `is_draft`, 
    `is_deleted`, 
    `created_at`,
    `modified_at`) 
    VALUES (
    NULL,
    :title,
    :picture, 
    :link,
    :promotional_message, 
    NULL,
    :is_active, 
    :is_deleted,
    NULL,
   :created_at, 
   :modified_at);";



$sth = $this->conn->prepare($query);
$sth->bindParam(':title',$this->title);
$sth->bindParam(':link',$this->link);
$sth->bindParam(':picture',$this->picture);
$sth->bindParam(':promotional_message',$this->promotional_message);
$sth->bindParam(':is_active',$this->is_active);
$sth->bindParam(':is_deleted',$this->is_deleted);
$sth->bindParam(':created_at',$this->created_at);
$sth->bindParam(':modified_at',$this->modified_at);

 //$sth->bindParam(':created_at',date('Y-m-d h:i:s', time()));
// $sth->bindParam(':modified_at',date('Y-m-d h:i:s', time()));
//$sth->bindParam(':promotional_message',$promotional_message);
//$sth->bindParam(':html_banner',$html_banner);
$result = $sth->execute();
return $result;




}

function show($id = null){
    if (empty($id)) {
            return;
            }

$query = 'SELECT * FROM products WHERE id = :id';
$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();
$banner = $sth->fetch(PDO::FETCH_ASSOC);



return $banner;

}

function search($data){

    

    
if (isset($data)){
    $searching = $data;
    $searching = preg_replace(" #[^0-9a-z]#", " ", $searching);
    $query = "SELECT * FROM products WHERE title LIKE '%$searching%' OR link LIKE '%$searching%' ";
   
    $sth = $this->conn->prepare($query);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
    
}

}




// function __toString(){

//     return $this->title;
// }
function softdelelte($id = null){

    if (empty($id)) {
        return;
        }

        $query = "UPDATE products SET  is_deleted = 1 WHERE id=:id;";

$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();
return $result;
}

function delete($id = null){

    //print_r($_REQUEST);die();
    if (empty($id)) {
        return;
        }

       
    $query = "DELETE FROM `products` WHERE `products`.`id` = :id;";
    $sth = $this->conn->prepare($query);
    $sth->bindParam(':id',$id);
    $result = $sth->execute();
     return $result;


}




function update($data){

if (empty($data)) {
   return;
}



//     if(array_key_exists('is_active',$data)){
//     $data['is_active'] = 1;
// }
// else{
//     $data['is_active']= 0;
// }

$this->prepare($data);
    
$query = "UPDATE `products` SET `title` = :title,
`picture` = :picture, 
`link` = :link, 
`is_active` = :is_active,
`modified_at` = :modified_at,
`promotional_message` = :promotional_message  WHERE `products`.`id` = :id;";


$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$this->id);
$sth->bindParam(':title',$this->title);
$sth->bindParam(':link',$this->link);
$sth->bindParam(':picture',$this->picture);
$sth->bindParam(':promotional_message',$this->promotional_message);
$sth->bindParam(':is_active',$this->is_active);
$sth->bindParam(':modified_at',$this->modified_at);
$result = $sth->execute();

return $result;

}


private function prepare($data){
    
  
    $this->title = $data['title'];
    $this->link = $data['link'];
    $this->picture = $data['picture'];
    $this->promotional_message = $data['promotional_message'];
    $this->is_active = $data['is_active'];
    $this->modified_at = date('Y-m-d h:i:s', time());

    if (empty($data['is_active'])) {
    $data['is_active'] =1;}

       if (array_key_exists('id',$data) && !empty($data['id'])) {
        $this->id = $data['id'];
       }

    if(!$this->id){
            $this->created_at = date('Y-m-d h:i:s', time());
        }
  
}




}
    


?>

