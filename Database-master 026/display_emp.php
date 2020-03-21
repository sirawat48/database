<script src='https://kit.fontawesome.com/a076d05399.js'></script>


<?php
require 'db.php';
$sql = 'SELECT * FROM emp';

$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <center><h2>พนักงานทั้งหมด</h2></center>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>รหัสพนักงาน</th>
          <th>ชื่อพนักงาน</th>
          <th>งาน</th>
          <th>รหัสหัวหน้า</th>
          <th>วันที่เริ่มงาน</th>
          <th>เงินเดือน</th>
          <th>คอมมิชชั่น</th>
          <th>แผนก</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->EMPNO; ?></td>
            <td><?= $person->ENAME; ?></td>
            <td><?= $person->JOB; ?></td>
            <td><?= $person->MGR; ?></td>
            <td><?= $person->HIREDATE; ?></td>
            <td><?= $person->SAL; ?></td>
            <td><?= $person->COMM; ?></td>
            <td><?= $person->DEPTNO; ?></td>
            <td>
            <a href="edit.php?id=<?=$person->EMPNO ?>" <button class="btn"></button> แก้ไข </a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?=$person->EMPNO ?>" class='btn'> ลบ </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
  <div class="form-group"><br>
      <center><input type="button" class="btn btn-primary" onclick="window.location='index.php'" value="ออกจากระบบ"></center> 
  </div>



