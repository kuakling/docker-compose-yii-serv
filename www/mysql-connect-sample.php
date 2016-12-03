<?php
try {
    $dbh = new PDO('mysql:host=mysql;dbname=world', 'root', 'password');
    echo '<h1>Database Connected.</h1>';
    echo '<h2>Country</h2>';
    foreach($dbh->query('SELECT * from Country') as $key => $row) {
        echo ($key+1) . '. ';
        echo $row['Name'] . "<br />\n";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
