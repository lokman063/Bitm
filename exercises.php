<?php
//include_once($_SERVER['DOCUMENT_ROOT'].'/phpcrud/bootstrap.php');
?>
<?php //include_once(DOCROOT.'/admin/views/elements/'.'sectiontitle.php');?>
<?php //include_once(DOCROOT.'/admin/views/elements/'.'graph.php');?>
<?php //include_once(DOCROOT.'/admin/views/elements/'.'samplepageelement.php');?>


<?php
ob_start();  // turns on output buffering
echo "Hello"; // output goes only to buffer
$o = ob_get_contents();  // stores buffer contents to the variable
ob_end_clean();  // clears buffer and closes buffering
//echo $o;


//$str1 = "##HELLO##, How are you?";
//$greetings = "Hi";

//echo str_replace("##HELLO##","Hi",$str1);