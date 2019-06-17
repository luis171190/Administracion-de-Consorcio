<?php

session_start();
unset ($SESSION['username']);
session_destroy();
global $privilegio;
$privilegio='';

header('Location: http://localhost:8080/linuji/index.php');

?>
