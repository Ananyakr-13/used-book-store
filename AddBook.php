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
?>
<?php
include('dbconfig.php');
include("head.php");
?>
<body>
    <?php
    include("StudentHeader.php");
    ?>
    <?php
    if (isset($_POST['submit'])) {


        $file = $_FILES["uploadfile"];
  
  
        // Extracting file information
        $fileName = $file["name"];
        $fileTmp = $file["tmp_name"];
        
        // Generating new file name with datetime
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = date("YmdHis") . "." . $extension;
        
        // Specifying the directory where the file should be saved
        $uploadDirectory = "uploads/";
        
      
       
        // Moving the uploaded file to the new location with the new name
        if (move_uploaded_file($fileTmp, $uploadDirectory . $newFileName)) {
            //echo "File uploaded successfully!";
            $bname = mysqli_real_escape_string($con, $_POST['bname']);
            $bauth = mysqli_real_escape_string($con, $_POST['bauth']);
            $bpub = mysqli_real_escape_string($con, $_POST['bpub']);
            $pyr = mysqli_real_escape_string($con, $_POST['pyr']);
            $bdesc = mysqli_real_escape_string($con, $_POST['bdesc']);
            $catid = mysqli_real_escape_string($con, $_POST['catid']);
            $price = mysqli_real_escape_string($con, $_POST['price']);
            $fkstudid = $s_id;
            $sql = "INSERT INTO book (fkcatid, fkstudid, bookName, author, publishedyear, publication, photo, price, bookdescription, booksold) VALUES ('$catid', '$fkstudid', '$bname', '$bauth', '$pyr', '$bpub','$newFileName','$price','$bdesc', 0)";
            //echo $sql;
            if (mysqli_query($con, $sql)) {
                echo '<script>alert("Book ' . $bname . ' uploaded successfully!");</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "Error uploading file.";
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
                            <a href="ViewBooks.php" class="btn btn-danger float-right">View Book</a>
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7">Add Book</h6>
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">
                                    <form action="AddBook.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="bname">Book Name</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4"  name="bname" id="bname" placeholder="Enter Book Name" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="bauth">Book Author</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" pattern="^[a-zA-Z\s]*$" title="Special Characters are not allowed" name="bauth" id="bauth" placeholder="Enter Book Author" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="bpub">Book Publication</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4"  name="bpub" id="bpub" placeholder="Enter Book Publication" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="pyr">Published year</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" pattern="^\d{4}$" title="Only 4 digits are accepted" name="pyr" id="pyr" placeholder="Enter Published year" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="bdesc">Book Description</label>
                                                <input type="text" class="form-control rounded-0 height-4 px-4" name="bdesc" id="bdesc" placeholder="Enter Book Description" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="catid">Category</label>
                                                <select required class="form-control" id="catid" name="catid">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    $selectsql = "SELECT * FROM category";
                                                    $myselectsql = mysqli_query($con, $selectsql);
                                                    while ($row = mysqli_fetch_array($myselectsql)) {
                                                        echo "<option value='" . $row['catid'] . "'>" . $row['catName'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="price">Price</label>
                                                <input type="number" class="form-control rounded-0 height-4 px-4" name="price" id="price" placeholder="Enter price" required="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label class="form-label" for="uploadfile">Photo</label>
                                                <input type="file" class="form-control rounded-0 height-4 px-4" name="uploadfile" id="uploadfile" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-block py-3 rounded-0 btn-dark">ADD</button>
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
