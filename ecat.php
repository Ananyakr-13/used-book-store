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
                            <a href="ViewDepartment.php" class="btn btn-danger float-right">View Category</a>
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 text-center">Update Category</h6>
                                
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">
                                   
                                <?php
                   if (isset($_GET['catid'])) {

   

                    $catid = $_GET['catid'];
                    if (isset($_POST['submit'])) {
                        foreach ($_POST AS $key => $value) {
                            $_POST[$key] = mysqli_real_escape_string($con, $value);
                        }
                        
                        $sql = "UPDATE `category` SET  `catName` =  '{$_POST['deptname']}'  WHERE `catid` = '$catid' ";
                        mysqli_query($con,$sql) or die(mysqli_error($con));
                        
                        if(mysqli_affected_rows($con))
                        {
                            Print '<script>alert("Category Updated Successfully");</script>'; 
                            Print '<script>window.location.assign("ViewCat.php");</script>'; 
                        }
                
                    }
                    $query = "SELECT * FROM `category` WHERE `catid` ='$catid'";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);
                }
                
            
                    ?>

                                    <form action="" method="post">
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel1" class="form-label" for="deptname">Category Name</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" name="deptname" id="deptname" value="<?php echo stripslashes($row['catName']) ?>" placeholder="Enter Department Name" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark" name="submit">UPDATE</button>
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
