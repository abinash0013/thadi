<?php
    include '../pages/header.php';
?>
<style>
    .text-left{
        padding: 50px;
    }
</style>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    // $productId=null;
    // $categoryName=null;
    // $categoryImage=null;
    // $singleItemPrice=null;
    // $description=null;
    // $offerId=null;
    $oId = $_GET['id'];
    $resultdata = $con->query("SELECT * FROM `tbl_mainOfferProduct` WHERE mainOfferProductId = '$oId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
        // $productId=$row['productId'];
        $offerId=$row['offerId'];
    }
    
    $resultdata = $con->query("SELECT tbl_subOfferProduct.*,tbl_category.categoryName,tbl_category.categoryImage FROM `tbl_subOfferProduct` LEFT JOIN  tbl_category on tbl_subOfferProduct.categoryId=tbl_category.categoryId  WHERE mainOfferProductId = '$oId'");
    $subresult = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $subresult[] = $row;
    }
?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data End <::::::::::::::::::::::::::::::::::: -->



<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Offer</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">                
                    <div class="col-lg-6 col-ml-12">                        
                        <div class="row">
                            <div class="col-xl-2 col-ml-2 col-mdl-2 col-sm-6 mt-5"></div>
                            <div class="col-xl-8 col-ml-8 col-mdl-8 col-sm-6 mt-5">
                                <div class="card">
                                    <div class="pricing-list">
                                        <div class="prc-head">
                                            <h4>Offer Details</h4>
                                        </div>
                                        <div class="prc-list text-left">                                        
                                            <?php foreach($result as $value) { ?>
                                                <form action="#"  method="POST" id="dataform">
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                            <div class="col">Image</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><img style="width:150px;height:150px"; src='<?php echo $value['image']; ?>'></div>
                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div class="col">Title </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['title']; ?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Price</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"></i><?php echo $value['price']; ?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Description</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"></i><?php echo $value['description']; ?></div>
                                                        </div> 
                                                    </div>
                                                </form>
                                                <hr>
                                            <?php } ?>
                                            
                                            <table id="dataTable2" class="mt-5">
                                                <thead class="text-capitalize">
                                                    <tr>
                                                        <th>Sl No.</th>
                                                        <th>Category Name</th>
                                                         <th>Category Image</th>
                                                        <th>Quantity</th> 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach($subresult as $value){  ?>
                                                        <form action="#"  method="post">
                                                        <tr>                                                   
                                                            <td><?php echo $i=$i+1?></td>
                                                            <td><?php echo $value['categoryName']; ?></td>
                                                            <td><img style="width:75px; Height:75px" src='<?php echo $value['categoryImage']; ?>'</td>
                                                            <td><?php echo $value['quantity']; ?></td>
                                                            
                                                            <td>
                                                                
                                                                <ul class="d-flex justify-content-center">
                                                                    <li class="mr-3"><span class="status-p bg-danger" data-toggle="modal" data-target="#<?php echo $value['subOfferProductId'];?>deletemodel1"><i class="ti-trash"></i></span></li>
                                                                    <div class="modal fade" id="<?php echo $value['subOfferProductId'];?>deletemodel1">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title text-center text-danger">Delete Item Offer Product</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p class="text-center text-boldr">You want to Delete this Item Offer Product</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                    <button type="button" class="btn btn-primary" onclick="deletefun(<?php echo $value['subOfferProductId'];?>)">Sure</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                  </form>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    
<?php
    include '../pages/footer.php';
?>