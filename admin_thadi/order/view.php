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
    $productId=null;
    $categoryName=null;
    $categoryImage=null;
    $singleItemPrice=null;
    $description=null;
    $offerId=null;
    $oId = $_GET['oid'];
    $resultdata = $con->query("SELECT * FROM `tbl_order` WHERE orderId = '$oId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
        $productId=$row['productId'];
        $offerId=$row['offerId'];
    }
?>

<?php 
if($productId != null){
    $resultdata = $con->query("SELECT * FROM `tbl_category` WHERE categoryId = '$productId'"); 
    while($rowProduct = mysqli_fetch_array($resultdata)) {
       $categoryName=$rowProduct['categoryName']; 
       $categoryImage=$rowProduct['categoryImage']; 
       $singleItemPrice=$rowProduct['singleItemPrice']; 
       $description=$rowProduct['description']; 
    }
}else{
    $subdata=array();
    $resultdata = $con->query("SELECT * FROM `tbl_mainOfferProduct` WHERE mainOfferProductId = '$offerId'"); 
    while($rowProduct = mysqli_fetch_array($resultdata)) {
       $categoryName=$rowProduct['title']; 
       $categoryImage=$rowProduct['image']; 
       $singleItemPrice=$rowProduct['price']; 
       $description=$rowProduct['description']; 
    }
     $subresultdata = $con->query("SELECT tbl_subOfferProduct.*,tbl_category.categoryName  FROM `tbl_subOfferProduct` LEFT JOIN tbl_category on tbl_subOfferProduct.categoryId=tbl_category.categoryId    WHERE mainOfferProductId = '$offerId'"); 
    while($subrowProduct = mysqli_fetch_array($subresultdata)) {
       $subdata[]=$subrowProduct;  
       
    }
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
                                <li><span>Order</span></li>
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
                                            <h4>Order Details</h4>
                                        </div>
                                        <div class="prc-list text-left">                                        
                                            <?php foreach($result as $value) { ?>
                                                <form action="#"  method="POST" id="dataform">
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                            <div class="col">Category Image</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><img style="width:150px;height:150px"; src='<?php echo $categoryImage; ?>'></div>
                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div class="col">Sl. No. </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['orderId']; ?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Category Id</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"></i><?php echo $value['productId']; ?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Offer Id </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"></i><?php echo $value['offerId']; ?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Amount </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['amount'];?></div>
                                                        </div>   
                                                        <div class="col-md-4">
                                                            <div class="col">Quantity</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['quantity'];?></div>
                                                        </div>   
                                                        <div class="col-md-4">
                                                            <div class="col">User Id</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['userId'];?></div>
                                                        </div>   
                                                        <div class="col-md-4">
                                                            <div class="col">Order Status</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['orderStatus'];?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Payment Status</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['paymentStatus'];?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Payment Mode</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['paymentMode'];?></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="col">Delivery Address</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $value['deliveryAddress'];?></div>
                                                        </div> 
                                                        
                                                         <div class="col-md-4">
                                                            <div class="col">Category Name</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $categoryName; ?></div>
                                                        </div> 
                                                        
                                                         <div class="col-md-4">
                                                            <div class="col">Single Item Price</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $singleItemPrice; ?></div>
                                                        </div> 
                                                        
                                                     
                                                        
                                                         <div class="col-md-4">
                                                            <div class="col">Description</div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col">:</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col font-weight-bold"><?php echo $description; ?></div>
                                                        </div> 
                                                       <br>
                                                       <div class="col-md-12">
                                                        <div class="col font-weight-bold"><h3>Products Item</h2> </div>
                                                        </div>
                                                           <?php foreach($subdata as $data){?>
                                                           
                                                                <div class="col-md-4">
                                                                <div class="col">Name</div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="col">:</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="col font-weight-bold"><?php echo $data['categoryName']; ?></div>
                                                                </div> 
                                                                
                                                                 <div class="col-md-4">
                                                                <div class="col">Quantity</div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="col">:</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="col font-weight-bold"><?php echo $data['quantity']; ?></div>
                                                                </div> 
                                                                <p  class="col-md-12">-----------------------------------------------------------------------------------------------------------------------</p>
                                                                 
                                                          
                                                            
                                                        <?php } ?>
                                                        </div>
                                                </form>
                                            <?php } ?>
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
                <!--<p>© Copyright 2020. All right reserved.</p>-->
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <!--<div class="offset-area">-->
    <!--    <div class="offset-close"><i class="ti-close"></i></div>-->
    <!--    <ul class="nav offset-menu-tab">-->
    <!--        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>-->
    <!--        <li><a data-toggle="tab" href="#settings">Settings</a></li>-->
    <!--    </ul>-->
    <!--    <div class="offset-content tab-content">-->
    <!--        <div id="activity" class="tab-pane fade in show active">-->
    <!--            <div class="recent-activity">-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg1">-->
    <!--                        <i class="fa fa-envelope"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Rashed sent you an email</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg2">-->
    <!--                        <i class="fa fa-check"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Added</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg2">-->
    <!--                        <i class="fa fa-exclamation-triangle"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>You missed you Password!</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:20 Am</span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg3">-->
    <!--                        <i class="fa fa-bomb"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Member waiting for you Attention</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg3">-->
    <!--                        <i class="ti-signal"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>You Added Kaji Patha few minutes ago</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>01 minutes ago</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg1">-->
    <!--                        <i class="fa fa-envelope"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Ratul Hamba sent you an email</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                    <p>Hello sir , where are you, i am egerly waiting for you.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg2">-->
    <!--                        <i class="fa fa-exclamation-triangle"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Rashed sent you an email</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg2">-->
    <!--                        <i class="fa fa-exclamation-triangle"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Rashed sent you an email</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg3">-->
    <!--                        <i class="fa fa-bomb"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Rashed sent you an email</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--                <div class="timeline-task">-->
    <!--                    <div class="icon bg3">-->
    <!--                        <i class="ti-signal"></i>-->
    <!--                    </div>-->
    <!--                    <div class="tm-title">-->
    <!--                        <h4>Rashed sent you an email</h4>-->
    <!--                        <span class="time"><i class="ti-time"></i>09:35</span>-->
    <!--                    </div>-->
    <!--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div id="settings" class="tab-pane fade">-->
    <!--            <div class="offset-settings">-->
    <!--                <h4>General Settings</h4>-->
    <!--                <div class="settings-list">-->
    <!--                    <div class="s-settings">-->
    <!--                        <div class="s-sw-title">-->
    <!--                            <h5>Notifications</h5>-->
    <!--                            <div class="s-swtich">-->
    <!--                                <input type="checkbox" id="switch1" />-->
    <!--                                <label for="switch1">Toggle</label>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p>Keep it 'On' When you want to get all the notification.</p>-->
    <!--                    </div>-->
    <!--                    <div class="s-settings">-->
    <!--                        <div class="s-sw-title">-->
    <!--                            <h5>Show recent activity</h5>-->
    <!--                            <div class="s-swtich">-->
    <!--                                <input type="checkbox" id="switch2" />-->
    <!--                                <label for="switch2">Toggle</label>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>-->
    <!--                    </div>-->
    <!--                    <div class="s-settings">-->
    <!--                        <div class="s-sw-title">-->
    <!--                            <h5>Show your emails</h5>-->
    <!--                            <div class="s-swtich">-->
    <!--                                <input type="checkbox" id="switch3" />-->
    <!--                                <label for="switch3">Toggle</label>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p>Show email so that easily find you.</p>-->
    <!--                    </div>-->
    <!--                    <div class="s-settings">-->
    <!--                        <div class="s-sw-title">-->
    <!--                            <h5>Show Task statistics</h5>-->
    <!--                            <div class="s-swtich">-->
    <!--                                <input type="checkbox" id="switch4" />-->
    <!--                                <label for="switch4">Toggle</label>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>-->
    <!--                    </div>-->
    <!--                    <div class="s-settings">-->
    <!--                        <div class="s-sw-title">-->
    <!--                            <h5>Notifications</h5>-->
    <!--                            <div class="s-swtich">-->
    <!--                                <input type="checkbox" id="switch5" />-->
    <!--                                <label for="switch5">Toggle</label>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p>Use checkboxes when looking for yes or no answers.</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
<?php
    include '../pages/footer.php';
?>