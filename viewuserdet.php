<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if ($_SESSION['studid']) {
    
} else {
    header("location:index.php");
}
$s_id = $_SESSION['studid'];
$s_name = $_SESSION['studName'];
$studid = $_GET['studid'];
?>
<?php
include('dbconfig.php');
include("head.php");
?>
<body>
    <?php
    include("StudentHeader.php");
    ?>
    <main id="content">
        <div class="mb-8">
            <img class="img-fluid" src="assets/img/login-bg.jpg" alt="Image-Description">
            <div class="container">
                <div class="mb-lg-8">
                    <div class="col-lg-12 mx-auto">
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                            <div class="mb-4 mb-lg-7 ml-xl-4">
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 text-center">View Student Details</h6>
                                
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">
                                <table class="table table-striped table-bordered">

<thead>
<tr>
        <th>Student Name</th>
        <th>Student USN</th>
        <th>Student Phone</th>
        <th>Student Email</th>
        <th>Department</th>
    </tr>

</thead>

<tbody>

<?php

$selectsql = "select * from student inner join department on fkdeptid = deptid where studid = '".$studid."'";
$myselectsql = mysqli_query($con, $selectsql);


while ($row = mysqli_fetch_array($myselectsql)) {



    echo "<tr>";
    echo "<td> ".$row['studname']."</td>";
    echo "<td> ".$row['studusn']."</td>";
    echo "<td> ".$row['mobile']."</td>";
    echo "<td> ".$row['studmail']."</td>";
    echo "<td> ".$row['deptname']."</td>";
    echo "</tr>";
}


?>

</tbody>

</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include("footer.php");
    include("script.php");
    ?>
</body>
</html>
