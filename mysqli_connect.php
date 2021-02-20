<?php
    define('DB_USER','Admin');
    define('DB_PASSWORD','asdf@1234');
    define('DB_HOST','localhost');
    define('DB_NAME','bookstore');

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die('could not connect to the database'.mysqlii_connect_error());
    mysqli_set_charset($connection,'utf8');

?>