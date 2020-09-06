<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$query = "SELECT * FROM contacts ORDER BY id DESC ";
$sth = $conn->prepare($query);
$sth->execute();
$contacts = $sth->fetchAll(PDO::FETCH_ASSOC);

use Bitm\Utility\Message; ?>

<?php
ob_start();
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <?php
    if($message = Message::get()){
        ?>
        <div class="alert alert-success">
            <?php echo $message;?>
        </div>
        <?php
    }
    ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 >CONTACTS</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>contact/create.php" style="color: black">Add a new contact</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">

                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Subject</th>
                                    <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                            if($contacts){
                                foreach($contacts as $contact){
                                    ?>
                                    <tr class="text-center">



                                        <td class="contact-name">
                                            <h5><a href="show.php?id=<?php echo $contact['id'] ?>">
                                                    <?php echo $contact['name'];?></a></h5>

                                        </td>
                                        <td><a href="<?php echo $contact['eamil'];?>">
                                                <?php echo $contact['email'];?></a></td>
                                        <td><?php echo $contact['subject'];?></td>
                                        <td> <a href="<?=VIEW?>contact/edit.php?id=<?php echo $contact['id']?>">Edit</a>
                                            | <a href="<?=VIEW?>contact/delete.php?id=<?php echo $contact['id']?>">Delete</a></td>
                                    </tr>
                                <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no contact available. <a href="create.php">Click Here</a> to add a contact.
                                    </td>
                                </tr>
                                <?php
                            }
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>


