<?php
namespace Bitm\Admin;
use Bitm\Db\Db;
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use PDO;

class Admin
{

 public $id = null;
public $first_name = null;
public $last_name = null;
public $father_name = null;
public $mother_name = null;
public $email = null;
public $picture = null;
public $phone = null;
public $password = null;
public $nid_birth = null;
public $is_draft = null;
public $is_active = null;
public $is_deleted = 0;
public $created_at = null;
public $modified_at = null;

public $conn = null;

function __construct(){
$this->conn = Db::connect();

}

// index--------------------------------------------------------------------------------------
function index(){
$query = "SELECT * FROM admins WHERE is_deleted = 0 ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $sth->fetchAll(PDO::FETCH_ASSOC);
}
// index--------------------------------------------------------------------------------------end
// index--------------------------------------------------------------------------------------
function product(){
    $query = "SELECT * FROM admins WHERE is_active = 1 AND id=:id;";

    $sth = $this->conn->prepare($query);
    $sth->bindParam(':id',$id);
    return $sth->execute();
}
// index--------------------------------------------------------------------------------------end


// active--------------------------------------------------------------------------------------
function active(){
$query = "SELECT * FROM admins WHERE is_active = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $admins = $sth->fetchAll(PDO::FETCH_ASSOC);
}

function activate($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE admins SET  is_active = 1 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
// active--------------------------------------------------------------------------------------end


// inactive--------------------------------------------------------------------------------------
function inactive(){
 
$query = "SELECT admins.id, admins.product_title, admins.special_price , admins.product_picture, admins.mrp, brands.brand_title, categories.category_title FROM admins join brands ON  brands.id = admins.brand_id join categories ON categories.id = admins.category_id WHERE admins.is_active = 0 AND admins.is_deleted = 0 ORDER BY product_title ASC;";
$sth = $this->conn->prepare($query);
$sth->execute();
return $admins = $sth->fetchAll(PDO::FETCH_ASSOC);
}
function deactivate($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE admins SET  is_active = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
// inactive--------------------------------------------------------------------------------------end

// trash--------------------------------------------------------------------------------------
function trash(){


$query = "SELECT * FROM admins WHERE is_deleted = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $admins = $sth->fetchAll(PDO::FETCH_ASSOC);
}
function softdelelte($id = null){

    if (empty($id)) {
        return;
        }

        $query = "UPDATE admins SET  is_deleted = 1 WHERE id=:id;";

$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();
return $result;
}
// trash--------------------------------------------------------------------------------------end

// Draft--------------------------------------------------------------------------------------
function draft(){


$query = "SELECT * FROM admins WHERE is_draft = 1 ORDER BY id DESC ";
$sth = $this->conn->prepare($query);
$sth->execute();
return $admins = $sth->fetchAll(PDO::FETCH_ASSOC);
}
function drafting($id = null){

    if (empty($id)) {
        return;
        }

        $query = "UPDATE admins SET  is_draft = 1 WHERE id=:id;";

$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();
return $result;
}
function unDraft($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE admins SET  is_draft = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
// trash--------------------------------------------------------------------------------------end

// restore--------------------------------------------------------------------------------------
function restore($id){
    if (empty($id)) {
        return;
        }
        $query = "UPDATE admins SET  is_deleted = 0 WHERE id=:id;";

        $sth = $this->conn->prepare($query);
        $sth->bindParam(':id',$id);
        return $sth->execute();
}
// restore--------------------------------------------------------------------------------------end 



// Store--------------------------------------------------------------------------------------
function store($data){

        $this->prepare($data);

            $query = "INSERT INTO `admins` (`id`,
            `first_name`,
            `last_name`,
            `father_name`,
            `mother_name`,
            `email`, 
            `picture`,
            `phone`, 
            `password`,
            `nid_birth`,
            `is_draft`,
            `is_active`,
            `is_deleted`, 
            `modified_at`,
            `created_at`) VALUES (NULL,
           :first_name,
           :last_name,
           :father_name,
           :mother_name,
           :email,
           :picture,
           :phone,
           :password,
           :nid_birth,
           :is_draft,
           :is_active,
           :is_deleted,
           :modified_at,
           :created_at);";



$sth = $this->conn->prepare($query);

$sth->bindParam(':first_name', $this->first_name);
$sth->bindParam(':last_name', $this->last_name);
$sth->bindParam(':father_name', $this->father_name);
$sth->bindParam(':mother_name', $this->mother_name);
$sth->bindParam(':email',$this->email);
$sth->bindParam(':phone',$this->phone);
$sth->bindParam(':password',$this->password);
$sth->bindParam(':picture',$this->picture);
$sth->bindParam(':nid_birth', $this->nid_birth);
$sth->bindParam(':is_draft',$this->is_draft);
$sth->bindParam(':is_active',$this->is_active);
$sth->bindParam(':is_deleted',$this->is_deleted);
$sth->bindParam(':created_at',$this->created_at);
$sth->bindParam(':modified_at',$this->modified_at);
$result = $sth->execute();
return $result;
}
// Store--------------------------------------------------------------------------------------end 

// Show--------------------------------------------------------------------------------------
function show($id = null){
    if (empty($id)) {
            return;
            }

$query = 'SELECT * FROM admins WHERE id = :id';
$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();
$banner = $sth->fetch(PDO::FETCH_ASSOC);
return $banner;
}
// Show--------------------------------------------------------------------------------------end

// searching--------------------------------------------------------------------------------------
function search($data){
if (isset($data)){
    $searching = $data;
    $searching = preg_replace(" #[^0-9a-z]#", " ", $searching);
    $query = "SELECT * FROM admins WHERE product_title LIKE '%$searching%' OR link LIKE '%$searching%' ";
   
    $sth = $this->conn->prepare($query);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
    
}

}
// searching--------------------------------------------------------------------------------------end



// function __toString(){

//     return $this->product_title;
// }


function delete($id = null){

    //print_r($_REQUEST);die();
    if (empty($id)) {
        return;
        }

       
    $query = "DELETE FROM `admins` WHERE `admins`.`id` = :id;";
    $sth = $this->conn->prepare($query);
    $sth->bindParam(':id',$id);
    $result = $sth->execute();
     return $result;


}




function update($data){
   
if (empty($data)) {
   return;
}



//active or deactive---------------------------
if(array_key_exists('is_active',$data)){
    $data['is_active'] = 1;
}
else{
    $data['is_active']= 0;
}
// --------------------------------------
//active or deactive---------------------------
if(array_key_exists('is_new',$data)){
    $data['is_new'] = 1;
}
else{
    $data['is_new']= 0;
}
// --------------------------------------
//active or deactive---------------------------
if(array_key_exists('is_draft',$data)){
    $data['is_draft'] = 1;
}
else{
    $data['is_draft']= 0;
}
// --------------------------------------
$this->prepare($data);
   
$query = "UPDATE `admins` SET 
`first_name` = :first_name, 
`last_name` = :last_name, 
`father_name` = :father_name, 
`mother_name` = :mother_name, 
`email` = :email, 
`phone` = :phone, 
`password` = :password, 
`picture` = :picture, 
`nid_birth` = :nid_birth, 
`is_active` = :is_active,
`is_darft` = :is_darft,
`is_draft` = :is_draft,
`is_deleted` = :is_deleted,
`modified_at` = :modified_at WHERE `admins`.`id` = :id;";


$sth = $this->conn->prepare($query);
$sth->bindParam(':id',$this->id);
$sth->bindParam(':first_name', $this->first_name);
$sth->bindParam(':last_name', $this->last_name);
$sth->bindParam(':father_name', $this->father_name);
$sth->bindParam(':mother_name', $this->mother_name);
$sth->bindParam(':email',$this->email);
$sth->bindParam(':phone',$this->phone);
$sth->bindParam(':password',$this->password);
$sth->bindParam(':picture',$this->picture);
$sth->bindParam(':nid_birth', $this->nid_birth);
$sth->bindParam(':is_active',$this->is_active);
$sth->bindParam(':is_darft',$this->is_darft);
$sth->bindParam(':is_deleted',$this->is_deleted);
$sth->bindParam(':modified_at',$this->modified_at);



$result = $sth->execute();

return $result;

}


private function prepare($data){
    if (empty($data['is_active'])) {
        $data['is_active'] =0;}
    
      
        if (empty($data['is_draft'])) {
        $data['is_draft'] =0;}
        if (empty($data['is_deleted'])) {
        $data['is_deleted'] =0;}

    
    $this->first_name = $data['first_name'];
    $this->last_name = $data['last_name'];
    $this->father_name = $data['father_name'];
    $this->mother_name = $data['mother_name'];
    $this->email = $data['email'];
    $this->phone = $data['phone'];
    $this->password = $data['password'];
    $this->picture = $data['picture'];
    $this->nid_birth = $data['nid_birth'];
    $this->is_deleted = $data['is_deleted'];

    $this->is_active = $data['is_active'];
    $this->is_draft = $data['is_draft'];


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

