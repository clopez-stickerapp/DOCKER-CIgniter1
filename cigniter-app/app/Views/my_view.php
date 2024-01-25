<?php
$db = \Config\Database::connect();

$query   = $db->query('SELECT * FROM thecave_materials');
$results = $query->getResult();

foreach ($results as $row) {
    var_dump($row);
}
echo "This is my first view!!!";
?>