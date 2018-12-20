<?php

include('header.php');

if(!$_SESSION['user_id']) header('location:index.php');

echo "Welcome home!";

include('footer.php');

?>