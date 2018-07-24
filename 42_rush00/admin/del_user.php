<?php
include ("user.php");
$_GET['eid'] = $id;
del_user($id);
header ('Location: backoffice.php');
?>
