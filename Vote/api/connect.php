<?php

$connect = mysqli_connect("localhost","root","","vote") or die(" Connection Unsuccessful ");
if($connect)
{
    echo"Connected";

}
else{
    echo"Not Connected";
}

?>