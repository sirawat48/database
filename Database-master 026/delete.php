<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM emp WHERE EMPNO=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /budbus/");
}