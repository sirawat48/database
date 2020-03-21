<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM emp WHERE EMPNO=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$emp = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['ENAME'])  && isset($_POST['JOB'])  
&& isset($_POST['MGR']) && isset($_POST['HIREDATE'])  
&& isset($_POST['SAL'])  && isset($_POST['COMM'])  && isset($_POST['DEPTNO'])) {
  
  $EMPNO = $_POST['EMPNO'];
  $ENAME = $_POST['ENAME'];
  $JOB = $_POST['JOB'];
  $MGR = $_POST['MGR'];
  $HIREDATE = $_POST['HIREDATE'];
  $SAL = $_POST['SAL'];
  $COMM = $_POST['COMM'];
  $DEPTNO = $_POST['DEPTNO'];

  $sql = 'UPDATE emp SET ENAME=:ENAME, 
  JOB=:JOB, MGR=:MGR, HIREDATE=:HIREDATE, 
  SAL=:SAL, COMM=:COMM, DEPTNO=:DEPTNO WHERE EMPNO=:EMPNO';
  $statement = $connection->prepare($sql);
  if ($statement->execute([ ':ENAME' => $ENAME,':JOB' => $JOB,':MGR' => $MGR,
      ':HIREDATE' => $HIREDATE,':SAL' => $SAL,':COMM' => $COMM,':DEPTNO' => $DEPTNO, 
      ':EMPNO' => $EMPNO])) ;
    {
    header("Location: /budbus/");
  }
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>แก้ไขข้อมูลพนักงาน</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="EMPNO">รหัสพนักงาน</label>
          <input value="<?=$emp->EMPNO; ?>" type="text" name="EMPNO"  class="form-control">
        </div>

        <div class="form-group">
          <label for="ENAME">ชื่อพนักงาน</label>
          <input type="text" value="<?= $emp->ENAME; ?>" name="ENAME"  class="form-control">
        </div>

        <div class="form-group">
          <label for="JOB">งาน</label>
          <input type="text" value="<?= $emp->JOB; ?>" name="JOB"  class="form-control">
        </div>
        
        <div class="form-group">
          <label for="MGR">รหัสหัวหน้า</label>
          <select name ="mgr" class="form-control"> 
          <?php
          $sql = "select EMPNO, ENAME from emp where JOB in ('MANAGER' ,'PRESSIDENT')";
          $statement = $connection->prepare($sql);
          $statement->execute();
          $employee = $statement->fetchAll(PDO::FETCH_OBJ);
          foreach($employee as $emp){
            ?>
            <option value="<?=$emp->EMPNO?>"><?=$emp->ENAME;?> </option>
            ?>
            <?php
            }
            ?>
             </select>
        </div>
        <div class="form-group">
          <label for="HIREDATE">วันที่เริ่มงาน</label>
          <input type="date" value="<?= $emp->HIREDATE; ?>" name="HIREDATE"  class="form-control">
        </div>

        <div class="form-group">
          <label for="SAL">เงินเดือน</label>
          <input  value="<?= $person->SAL?>"type="number" step="any" name="SAL" id="SAL" class="form-control">
        </div>

        <div class="form-group">
          <label for="COMM">คอมมิชชั่น</label>
          <input value="<?= $person->COMM?>" type="number" step="any" name="COMM" id="COMM" class="form-control">
        </div>

        <div class="form-group">
          <label for="DEPTNO">แผนก</label>
          <select name ="DEPTNO" class="form-control">
          <?php
          $sql = "SELECT DEPTNO , DNAME FROM dept" ;
          $statement = $connection->prepare($sql);
          $statement->execute();
          $dept = $statement->fetchAll(PDO::FETCH_OBJ);
          foreach($dept as $dept):
          ?>
            <option value="<?=$dept->DEPTNO?>"><?=$dept->DNAME?></option>

          <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info"> บันทึกข้อมูลพนักงาน</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
