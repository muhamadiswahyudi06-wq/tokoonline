<?php
   $CON = mysqli_connect("localhost","root","","toko_online");
   // check connection
if (mysqli_connect_errno()) {
    echo"failed to connect to mysQl: "mysqli_connect_errno();
    exit();
}
?>