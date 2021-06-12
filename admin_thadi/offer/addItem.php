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
   
    $resultdata = $con->query("SELECT * FROM `tbl_category`");
    $tbl_categoryresultdata = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $tbl_categoryresultdata[] = $row;
    }
?>
<!-- :::::::::::::::::::::::::::::::::::> Fetch Data End <::::::::::::::::::::::::::::::::::: -->
<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
            $("#btnsubmit").hide();
            $("#loading").show();
            e.preventDefault();
            $.ajax({
                url: "api/add-item.php",
                type: "POST",
                dataType:"JSON",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    console.log(data)
                    $("#btnsubmit").show(); 
                    $("#loading").hide();
                    if(data.status == '200')
                    {
                        $("#successmessage").show()
                        $("#dataform")[0].reset(); 
                        window.location. reload();
                    }
                    else
                    { 
                        $("#err").show()
                    }
                },
                error: function(e) 
                {
                }          
            });
        }));
    });
</script>
<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->

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
                                        
                                                <form action="#" method="post" id='dataform'>
                                                    <input type="hidden" name="mainOfferProductId" value="<?php echo $_GET['id'];?>"/>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-1 mt-3 float-right"> 
                                                            <input type="button" class="add-row btn btn-warning text-white block" value="Add To Table">
                                                        </div>
                                                    </div>
                                                    
                                                    <table  class="table dt-responsive table-striped table-bordered nowrap" style="margin-top: 10px">
                                                        <thead>
                                                            <tr>
                                                                <th><button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light delete-row" style="margin-top:10px;"><span class="ti-trash"></span></button></th>
                                                                
                                                                <th>Category</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-group">                                              
                                                        <button type="submit" class="btn btn-primary mb-3 float-right" id="btnsubmit">Submit</button>
                                                    </div>
                                                </form>
                                                <input type="hidden" name="mainOfferProductId" value="<?php echo $_GET['id'];?>"/>
                                                
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $(".add-row").click(function() {
                                                                var quantity = $("#quantity").val();
                                                                var category = $("#category").val();
                                                                var markup = "<tr><td><input  type='checkbox' name='record'></td>" +
                                                                "<td><select  class='form-control form-control-sm myform'  name='category[]' class='form-control form-control-sm myform'>"+
                                                                 <?php foreach($tbl_categoryresultdata as $data){ ?>
                                                                " <option value='<?php echo $data['categoryId']?>'><?php echo $data['categoryName']?></option>"+
                                                                 <?php } ?>
                                                                "</select></td>"+
                                                                
                                                                
                                                                "<td><input  class='form-control form-control-sm myform' type='number' name='quantity[]' value='"+ quantity +"'></td>"
                                                               "</tr>";
                                                          
                                                                $("table tbody").append(markup);
                                                            });
                                                            
                                                           
                                                            $(".delete-row").click(function() {
                                                                $("table tbody").find('input[name="record"]').each(function() {
                                                                    if ($(this).is(":checked")) {
                                                                        $(this).parents("tr").remove();
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    </script>

                                                    <style>
                                                        .table td, .table th {
                                                            padding: 0.3rem;
                                                            vertical-align: top;
                                                            border-top: 1px solid #eceeef;
                                                        }
                                                        button, input, select, textarea {
                                                            margin: 0;
                                                            border: none;
                                                            background: #f2f2f2;
                                                            line-height: inherit;
                                                            border-radius: 0;
                                                        }
                                                        .table td, .table th {
                                                            padding: 0px;
                                                            background: #f2f2f2;
                                                            vertical-align: top;
                                                            border-top: 1px solid #b1b3b3;
                                                        }
                                                        .table-bordered td, .table-bordered th {
                                                            border: 1px solid #b6b7b8;
                                                            text-align: center;
                                                            margin-top: 10px;
                                                        }
                                                        .table thead th {
                                                            border-bottom: 2px solid #adadad;
                                                            padding-bottom: 18px;
                                                        }
                                                    </style>
                                                    <!--///////////////////////////////////////add row///////////////////////////////////-->
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