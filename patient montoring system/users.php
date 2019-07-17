<?php
function loggedin() //line 67 
{
    //return (isset($_SESSION['username'] )) ? true : false;
    return (isset($_SESSION['password'] )) ? true : false;
}
?>