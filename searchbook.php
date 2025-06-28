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
                                <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 text-center">Search Book</h6>
                            </div>
                            <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                <div class="p-4 p-md-6">


                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label class="form-label" for="catid">Category</label>
                                            <select required class="form-control" id="catid" onchange="getBookByCat(this.value)" name="catid">
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


                                </div>
                            </div>


                            <div class="site-content" id="content">
                                <div class="container">
                                    <div class="row">
                                        <div id="primary" class="content-area order-2">
         
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade active show" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">

                                                    <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-lg-3 row-cols-xl-3 border-top border-left mb-6" id="booklist">
                                                       
                                                    
                                                        
                                                    </ul>

                                                </div>
                                              
                                            </div>

                                        </div>
                                        <div id="secondary" class="sidebar widget-area order-1" role="complementary">
                                        </div>
                                    </div>
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

    <script>
        function getBookByCat(id) {
            let url = 'http://localhost:8081/ubs/getListByCat.php?catid=' + id;
            var booklist = "";
            var jsondata;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    for(let j=0; j<=data.length; j++)
                    {
                        if(j!=0)
                        {

                            data.splice(0, 1); 
                            jsondata = data
                            console.log(jsondata);
                            break;
                        }
                        
                    }
                    for(let i=0; i<jsondata.length; i++)
                    {
                        booklist += `<li class="product col">
                                     <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                         <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                             <div class="woocommerce-loop-product__thumbnail">
                                                 <a href="#" class="d-block"><img src="uploads/${jsondata[i].photo}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                             </div>
                                             <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                             <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="#">${jsondata[i].bookName}</a></div>
                                                 <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="#">${jsondata[i].bookdescription}</a></h2>
                                                 <div class="font-size-2  mb-1 text-truncate"><a href="#" class="text-gray-700">${jsondata[i].author}</a></div>
                                                 <div class="font-size-2  mb-1 text-truncate"><a href="#" class="text-gray-700">${jsondata[i].publication}(${jsondata[i].publishedyear})</a></div>
                                                 <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                     <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs</span>${jsondata[i].price}</span>
                                                 </div>
                                                 <a href="sendrequest.php?bookid=${jsondata[i].bookid}" class="btn btn-sm btn-dark">Send Request</a>
                                             </div>
                                             
                                         </div>
                                     </div>
                                 </li>`;
                    }

                    
                    document.getElementById("booklist").innerHTML = booklist;

                });
        }
    </script>

</body>

</html>