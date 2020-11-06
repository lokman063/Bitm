<?php
namespace Bitm\Admin;
use Bitm\Db\Db;
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use PDO;

class Admin
{
public $id = null;
public $product_code = null;
public $brand_id = null;
public $category_id = null;
public $product_title = null;
public $product_picture = null;
public $short_description = null;
public $description = null;
public $cost = null;
public $mrp = null;
public $special_price = null;
public $is_new = null;
public $is_active = null;
public $total_sales = null;
public $is_draft = null;
public $is_deleted = 0;
public $created_at = null;
public $modified_at = null;
public $conn = null;

function __construct(){
$this->conn = Db::connect();

}

// index--------------------------------------------------------------------------------------
function index(){
$query = "SELECT * FROM admins ";
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
        `product_code`, 
        `brand_id`, 
        `category_id`,
        `product_title`,
        `product_picture`,
        `short_description`,
        `description`,
        `cost`, 
        `mrp`,
        `special_price`,
        `is_new`,
        `is_draft`,
        `is_active`,
        `total_sales`,
        `is_deleted`, 
        `created_at`,
        `modified_at`) VALUES (NULL,
        :product_code, 
        :brand_id, 
        :category_id, 
        :product_title,
        :product_picture,
        :short_description,
        :description, 
        :cost, 
        :mrp,
        :special_price,
        :is_new, 
        :is_draft,
        :is_active,
        :total_sales,
        :is_deleted, 
        :created_at, 
        :modified_at);";



$sth = $this->conn->prepare($query);

$sth->bindParam(':product_code',$this->product_code);
$sth->bindParam(':brand_id',$this->brand_id);
$sth->bindParam(':category_id',$this->category_id);
$sth->bindParam(':product_title',$this->product_title);
$sth->bindParam(':product_picture',$this->product_picture);
$sth->bindParam(':short_description',$this->short_description);
$sth->bindParam(':description',$this->description);
$sth->bindParam(':cost',$this->cost);
$sth->bindParam(':mrp',$this->mrp);
$sth->bindParam(':special_price',$this->special_price);
$sth->bindParam(':total_sales',$this->total_sales);
$sth->bindParam(':is_active',$this->is_active);
$sth->bindParam(':is_new',$this->is_new);
$sth->bindParam(':is_draft',$this->is_draft);
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
`brand_id` = :brand_id,
`category_id` = :category_id, 
`product_title` = :product_title, 
`product_picture` = :product_picture, 
`short_description` = :short_description, 
`description` = :description, 
`cost` = :cost, 
`mrp` = :mrp, 
`special_price` = :special_price, 
`total_sales` = :total_sales, 
`is_active` = :is_active,
`is_new` = :is_new,
`is_draft` = :is_draft,
`is_deleted` = :is_deleted,
`modified_at` = :modified_at WHERE `admins`.`id` = :id;";


$sth = $this->conn->prepare($query);

$sth->bindParam(':id',$this->id);
$sth->bindParam(':brand_id',$this->brand_id);
$sth->bindParam(':category_id',$this->category_id);
$sth->bindParam(':product_title',$this->product_title);
$sth->bindParam(':product_picture',$this->product_picture);
$sth->bindParam(':short_description',$this->short_description);
$sth->bindParam(':description',$this->description);
$sth->bindParam(':cost',$this->cost);
$sth->bindParam(':mrp',$this->mrp);
$sth->bindParam(':special_price',$this->special_price);
$sth->bindParam(':total_sales',$this->total_sales);
$sth->bindParam(':is_active',$this->is_active);
$sth->bindParam(':is_new',$this->is_new);
$sth->bindParam(':is_draft',$this->is_draft);
$sth->bindParam(':is_deleted',$this->is_deleted);
$sth->bindParam(':modified_at',$this->modified_at);


$result = $sth->execute();

return $result;

}


private function prepare($data){
    if (empty($data['is_active'])) {
        $data['is_active'] =0;}
    
        if (empty($data['is_new'])) {
        $data['is_new'] =0;}
    
        if (empty($data['is_draft'])) {
        $data['is_draft'] =0;}
    
    if (empty($data['product_code'])) {
        $data['product_code'] =uniqid();}
    $this->product_code = $data['product_code'];
    $this->brand_id = $data['brand_id'];
    $this->category_id = $data['category_id'];
    $this->product_title = $data['product_title'];
    $this->product_picture = $data['product_picture'];
    $this->short_description = $data['short_description'];
    $this->description = $data['description'];
    $this->mrp = $data['mrp'];
    $this->cost = $data['cost'];
    $this->special_price = $data['special_price'];
    $this->is_active = $data['is_active'];
    $this->is_new = $data['is_new'];
    $this->is_draft = $data['is_draft'];
    $this->total_sales = $data['total_sales'];

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

