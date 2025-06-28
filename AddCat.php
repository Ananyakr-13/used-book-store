<!DOCTYPE html>
<html lang="en">
<?php
include('dbconfig.php');
include("head.php");
?>
<body>
    <?php
    include("AdminHeader.php");
    ?>
    <main id="content">
        <div class="mb-5">
            <img class="img-fluid" src="assets/img/login-bg.jpg" alt="Image-Description">
            <div class="container">
                <div class="mb-lg-8">
                    <div class="col-lg-9 mx-auto">
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                            <div class="mb-4 mb-lg-7 ml-xl-4">
                            <a href="ViewCat.php" class="btn btn-danger float-right">View Category</a>
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 text-center">Add Category</h6>
                                
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">
                                   

<?php
                    if (isset($_POST['submit'])) {
                        $catName = $_POST['deptname'];

                        $bool = true;

                        $query = mysqli_query($con, "Select * from category");
                        while ($row = mysqli_fetch_array($query)) {
                            $table_dept_name = $row['catName'];
                            if (strtolower($catName) == strtolower($table_dept_name)) {
                                $bool = false;
                                Print '<script>alert("Category already exist!");</script> ';
                            }
                        }

                        if($bool)
                        {
                            $sql = "INSERT INTO category(catName)values ('".$catName."')";
                            mysqli_query($con, $sql);
                            
                            Print '<script>alert("Added Successfully!");</script>';
                        }
                       
                    }
                    ?>
                                    <form action="AddCat.php" method="post">
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel1" class="form-label" for="deptname">Category Name</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" name="deptname" id="deptname" placeholder="Enter Category Name" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark" name="submit">ADD</button>
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
