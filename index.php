<?php
session_start();

if (isset($_SESSION['auth'])) {
    echo "Logged in";
    echo "<br><br><pre>";
    print_r($_SESSION['auth']);
    echo "</pre>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "Not logged in";
    echo "<br><br>";
    echo "<a href='auth.php'>Sign in to twitter</a>";
}