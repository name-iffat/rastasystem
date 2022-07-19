<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['lname']);

session_unset();

// Delete all session variables
session_destroy();

// Jump to login page
header('Location: ../adminlogin.html');
?>