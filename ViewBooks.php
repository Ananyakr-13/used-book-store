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
    <main id="content">
        <div class="mb-8">
            <img class="img-fluid" src="assets/img/login-bg.jpg" alt="Image-Description">
            <div class="container">
                <div class="mb-lg-8">
                    <div class="col-lg-12 mx-auto">
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                            <div class="mb-4 mb-lg-7 ml-xl-4">
                            <a href="AddBook.php" class="btn btn-danger float-right">Add Book</a>
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 text-center">View Book</h6>
                                
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">
                                <table class="table table-striped table-bordered">

<thead>

    <tr>
        <th>Category Name</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Publication</th>
        <th>Published Year</th>
        <th>Book Price</th>
        <th>Book Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

</thead>

<tbody>

<?php

$selectsql = "select * from book inner join category on fkcatid = catid";
$myselectsql = mysqli_query($con, $selectsql);


while ($row = mysqli_fetch_array($myselectsql)) {


echo "<tr>";
echo "<td> ".$row['catName']."</td>";
echo "<td> ".$row['bookName']."</td>";
echo "<td> ".$row['author']."</td>";
echo "<td> ".$row['publication']."</td>";
echo "<td> ".$row['publishedyear']."</td>";
echo "<td> ".$row['price']."</td>";
echo "<td> ".$row['bookdescription']."</td>";
echo "<td> <img src='uploads/".$row['photo']."' style='width:100px;' /></td>";
if($row['booksold'] == 0)
{
    echo "<td><span class='label label-success'>Unsold</span></td>";
}
else
{
    echo "<td><span class='label label-danger'>Sold</span></td>";
}
echo "<td>";
if($row['booksold'] == 0)
{
    echo "<a class='btn btn-sm btn-success' href=subook.php?bookid={$row['bookid']}><i class='fas fa-check'></i></a>
    <a class='btn btn-sm btn-danger' href=dbook.php?bookid={$row['bookid']}><i class='fas fa-trash'></i></a>";
}
else
{
    echo    "<a class='btn btn-sm btn-danger' href=dbook.php?bookid={$row['bookid']}><i class='fas fa-trash'></i></a>";
}

echo "</td> ";

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
