<?php
if (isset($_GET['name'])) {
    $filename = $_GET['name'];
    file_put_contents($filename, date('l'));
    header('Location: webpage3.php?name=' . $filename);
} else {
    echo "No input found";
}
?>
