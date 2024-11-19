<?php 
require_once("header.php");
require_once("navigation.php");
if(isset($_GET['addelectionpage'])){
    require_once("addelection.php");
}
elseif(isset($_GET['addcondidatepage'])){
    require_once("addcondidates.php");
}
?>


<?php 
require_once("footer.php");
?>