<?php

    $filename = $_GET['name'];
    echo file_get_contents($filename);

?>
