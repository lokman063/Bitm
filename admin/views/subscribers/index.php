<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



//selection query
$query = "SELECT * FROM `subscribers`";
$sth = $conn->prepare($query);
$sth->execute();
$subscribers = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
ob_start();
?>



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Subscriber</h1>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    <a href="add.php" style="color: black">Add New</a>
                </button>

            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Email</th>
                                <th>Is_Subscribed</th>
                                <th>Reason_text</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <?php
                            if($subscribers)
                            {
                            foreach($subscribers as $subscriber)
                            {
                            ?>
                            <tbody>
                            <tr class="text-center">
                                <td>
                                    <h3><a href="view.php?id=<?php echo $subscriber['id']; ?>"><?php echo $subscriber['email'];?></a></h3>
                                </td>
                                <td>
                                    <h3><?php echo $subscriber['is_subscribed'];?></h3>
                                </td>
                                <td>
                                    <h3><?php echo $subscriber['reason'];?></h3>
                                </td>
                                <td> <a href="<?=VIEW?>subscribers/edit.php?id=<?php echo $subscriber['id']; ?>">Edit</a>|
                                    <a href="<?=VIEW?>subscribers/delete.php?id=<?php echo $subscriber['id']?>">Delete</a></td>
                            </tr>

                            <?php
                            }}
                            else
                            {
                                ?>
                                <tr><td>There is no more data<a href="add.php"> click here</a> for add data</td></tr>
                            <?php }?>
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
