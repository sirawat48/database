<?php 
 if(isset($_POST['submit'])){
    require_once 'db.php';
    $empno = $_POST['empno'];
    $ename = $_POST['ename'];
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $sql = "INSERT INTO emp (EMPNO,ENAME,USERNAME,PASSWORD) VALUES (?,?,?,?)";
    $statement = $connection->prepare($sql);
    if ($statement->execute([$empno, $ename, $username, $password])) 
      {
      echo 'ลงทะเบียนเสร็จเรียบร้อย';
      }
} 
?>
<?php require 'header.php'; ?>
  <div class="card mt-5">
    <div class="card-header">
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
        <?= $message; ?>
        </div>
      <?php endif; ?>

<br>
<div  class="offset-sm-6 col-sm-5">

<h2>สร้างบัญชีใหม่</h2>
</div>
<form name="register" action="" method="post">
<br>
<div  class="offset-sm-6 col-sm-5">
  <input type="text" class="form-control" name="empno" placeholder="รหัสพนักงาน" required>
</div>
<br>

<div class="offset-sm-6 col-sm-5">
  <input type="text" class="form-control" name="ename" placeholder="ชื่อ"required>
</div>
<br>

<div class="offset-sm-6 col-sm-5">
  <input type="text"  class="form-control" name="username" placeholder="อีเมล"required>
</div>
<br>

<div class="offset-sm-6 col-sm-5">
  <input type="password" class="form-control"name="password" placeholder="รหัสผ่าน"required>
</div>
<br>
<div class="offset-sm-6 col-sm-2">
  <input style="blackground-color: Green" type="submit" class="btn btn-success btn-block" name="submit" value="สมัคร" class="btn btn-primary"/>
</div>
</form>
<?php require 'footer.php'; ?>
