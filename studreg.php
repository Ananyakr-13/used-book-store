<!DOCTYPE html>
<html lang="en">
<?php
include('dbconfig.php');
include("head.php");
?>
<body>
    <?php
    include("HomeHeader.php");
    ?>
    <?php
    if (isset($_POST['submit'])) {
        $studname = mysqli_real_escape_string($con, $_POST['studname']);
        $studusn = mysqli_real_escape_string($con, $_POST['studusn']);
        $studph = mysqli_real_escape_string($con, $_POST['studph']);
        $studmail = mysqli_real_escape_string($con, $_POST['studmail']);
        $deptid = mysqli_real_escape_string($con, $_POST['deptid']);
        $password = md5(mysqli_real_escape_string($con, $_POST['password']));
        $bool = true;
        $query = mysqli_query($con, "SELECT * FROM student WHERE studusn = '$studusn'");
        if (mysqli_num_rows($query) > 0) {
            $bool = false;
            echo '<script>alert("Student already exists!");</script>';
        }
        if ($bool) {
            $sql = "INSERT INTO student (studname, fkdeptid, mobile, studusn, studpass, studmail, isActive) VALUES ('$studname', '$deptid', '$studph', '$studusn', '$password', '$studmail', 0)";
            if (mysqli_query($con, $sql)) {
                echo '<script>alert("Student ' . $studname . ' registered successfully!");</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }
    ?>
    <main id="content">
        <div class="mb-5">
            <img class="img-fluid" src="assets/img/login-bg.jpg" alt="Image-Description">
            <div class="container">
                <div class="mb-lg-8">
                    <div class="col-lg-9 mx-auto">
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                            <div class="mb-4 mb-lg-7 ml-xl-4">
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7">Student Registration</h6>
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">
                                    <form action="studreg.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="studname">Student Name</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" pattern="^[a-zA-Z\s]*$" title="Special Characters are not allowed" name="studname" id="studname" placeholder="Enter Student Name" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="studusn">Student USN</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" name="studusn" id="studusn" placeholder="Enter Student USN" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="studph">Student Mobile</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" pattern="^\d{10}$" title="Only numbers and 10 digit are accepted" name="studph" id="studph" placeholder="Enter Student Mobile" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="studmail">Student E-Mail</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" title="pattern does not match" name="studmail" id="studmail" placeholder="Enter Student E-Mail" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="deptid">Department</label>
                                                <select required class="form-control" id="deptid" name="deptid">
                                                    <option value="">Select Department</option>
                                                    <?php
                                                    $selectsql = "SELECT * FROM department";
                                                    $myselectsql = mysqli_query($con, $selectsql);
                                                    while ($row = mysqli_fetch_array($myselectsql)) {
                                                        echo "<option value='" . $row['deptid'] . "'>" . $row['deptname'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="password">Password *</label>
                                                <input type="password" title="Password should contain At least 1 Uppercase, At least 1 Lowercase,At least 1 Number,At least 1 Symbol,Min 8 chars and Max 12 chars " pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" class="form-control rounded-0 height-4 px-4" name="password" id="password" placeholder="Enter password" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-block py-3 rounded-0 btn-dark">Register</button>
                                        </div>
                                    </form>
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
