<?php
namespace Bitm\Category;
use Bitm\Db\Db;
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use PDO;

class Category
{
public $id = null;
public $title = null;
public $link = null;
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
//$query = "SELECT * FROM categories WHERE is_deleted = 0 ORDER BY id DESC ";
 $query = "SELECT * FROM categories ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function active(){


$query = "SELECT * FROM categories WHERE is_active = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
}
function inactive(){


$query = "SELECT * FROM categories WHERE is_active = 0 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
}

function trash(){


$query = "SELECT * FROM categories WHERE is_deleted = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
}


function restore($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE categories SET  is_deleted = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
function activate($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE categories SET  is_active = 1 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
function deactivate($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE categories SET  is_active = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}

function store($data){

        $this->prepare($data);

        $query = "INSERT INTO `categories` (`id`, 
        `name`,
        `link`,
        `is_deleted`,
        `is_draft`, 
        `created_at`, 
        `modified_at`) VALUES (NULL,
        :name,
        :link,
       null,
        NULL, 
        :created_at,
        :modified_at);";



$sth = $this->conn->prepare($query);


$sth->bindParam(':name',$this->name);
$sth->bindParam(':link',$this->link);
$sth->bindParam(':created_at',$this->created_at);
$sth->bindParam(':modified_at',$this->modified_at);
$result = $sth->execute();


return $result;




}

function show($id = null){
    if (empty($id)) {
            return;
            }

$query = 'SELECT * FROM categories WHERE id = :id';
$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();
$Category = $sth->fetch(PDO::FETCH_ASSOC);



return $Category;

}

function search($data){

    

    
if (isset($data)){
    $searching = $data;
    $searching = preg_replace(" #[^0-9a-z]#", " ", $searching);
    $query = "SELECT * FROM categories WHERE title LIKE '%$searching%' OR link LIKE '%$searching%' ";
   
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

        $query = "UPDATE categories SET  is_deleted = 1 WHERE id=:id;";

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

       
    $query = "DELETE FROM `categories` WHERE `categories`.`id` = :id;";
    $sth = $this->conn->prepare($query);
    $sth->bindParam(':id',$id);
    $result = $sth->execute();
     return $result;


}




function update($data){

if (empty($data)) {
   return;
}
//prepare data
$this->prepare($data);
    


     $query = "UPDATE `categories` SET `name` = :name,
            `link` = :link, 
             `modified_at` = :modified_at WHERE `categories`.`id` = :id;";

$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$this->id);
$sth->bindParam(':name',$this->name);
$sth->bindParam(':link',$this->link);
$sth->bindParam(':modified_at',$this->modified_at);
$result = $sth->execute();

return $result;

}

//prepare data
private function prepare($data){
 


    $this->name = $data['name'];
    $this->link = $data['link'];
    $this->modified_at = date('Y-m-d h:i:s', time());



       if (array_key_exists('id',$data) && !empty($data['id'])) {
        $this->id = $data['id'];
       }

    if(!$this->id){
            $this->created_at = date('Y-m-d h:i:s', time());
        }
        

}




}
    


?>

