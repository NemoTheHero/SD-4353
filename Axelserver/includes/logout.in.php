<?php

session_start(); // start the session
session_unset(); // take all the ID and Usernames from the previous session and delete it to be able to log out
session_destroy();// destroy the functions

// Bring user back to index page that is logged out.
header("Location: ../index.php");
