<?php
session_start();
if(isset($_SESSION['voter_id'])){
session_destroy();
}
header("location: index.php");



?>