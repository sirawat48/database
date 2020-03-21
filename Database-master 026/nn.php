<?php
    require 'db.php';
    $sql = "select EMPNO, ENAME from emp where JOB in ('MANAGER' ,'PRESSIDENT')";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $employee = $statement->fetchAll(PDO::FETCH_OBJ);
    ?>
    <select name ="mgr">
    <?php
    foreach($employee as $emp){
        ?>
            <option value="<?=$emp->EMPNO?>"><?=$emp->ENAME;?> </option>
            ?>
            <?php
            }
            ?>
        </select>
    