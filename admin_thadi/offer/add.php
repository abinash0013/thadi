<?php
    include '../pages/header.php';
?>
<style>
    .myform {
        margin-bottom: 10px !important;
    }
</style>

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
            $("#btnsubmit").hide();
            $("#loading").show();
            e.preventDefault();
            $.ajax({
                url: "api/add-api.php",
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
                                <li><span>Category</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin <i class="fa fa-angle-down"></i></h4>
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
                            <div class="col-xl-2 col-ml-2 col-mdl-4 col-sm-6 mt-5">
                            </div>
                            <div class="col-xl-3 col-ml-8 col-mdl-4 col-sm-6 mt-5">
                                <!-- success alert -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successmessage" style="display:none">
                                    You had <strong>Successfully Added</strong>a New Offer
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <!-- <span class="fa fa-times"></span> -->
                                    </button>
                                </div>
                                <!-- success alert -->
                                <!-- failed alert -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="err" style="display:none">
                                    Something went wrong...! Failed
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <!-- <span class="fa fa-times"></span> -->
                                    </button>
                                </div>
                                <!-- failed alert -->
                                <div class="card">
                                    <form action="#" method="post" id='dataform'>
                                        <div class="pricing-list">
                                            <div class="prc-head">
                                                <h4>Add Offer</h4>
                                            </div>
                                            <div class="prc-list text-left">
                                                <div class="row">
                                                     <div class="col-md-3">
                                                        <div class="col">State</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <select name="categoryType" class="form-control form-control-sm myform"  >
                                                                <option value="first">first</option>
                                                                <option value="second">second</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col">Title</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <input type="text" class="form-control form-control-sm myform" placeholder="Title" id="title" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col">Price</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <input type="number" class="form-control form-control-sm myform" placeholder="Enter Price" id="price" name="price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col">Image</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col">Description</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <textarea class="form-control" aria-label="With textarea" placeholder="Write Something" id="description" name="description"></textarea>
                                                        </div>
                                                    </div><div class="col-md-3">
                                                        <div class="col">Quantity</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <input type="number" class="form-control form-control-sm myform" placeholder="Enter Quantity" id="quantity" name="quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col">Category</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col">:</div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="col font-weight-bold">
                                                            <select name="category" id="category" class="form-control form-control-sm myform">
                                                                <option value="first">first</option>
                                                                <option value="second">second</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--//////////////////////////////add row /////////////////////////////////////-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-1 mt-3 float-right"> 
                                                            <input type="button" class="add-row btn btn-warning text-white block" value="Add To Table">
                                                        </div>
                                                    </div>
                                                    
                                                    <table  class="table dt-responsive table-striped table-bordered nowrap" style="margin-top: 10px">
                                                        <thead>
                                                            <tr>
                                                                <th><button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light delete-row" style="margin-top:10px;"><span class="ti-trash"></span></button></th>
                                                                <th>Quantity</th>
                                                                <th>Category</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $(".add-row").click(function() {
                                                                var quantity = $("#quantity").val();
                                                                var category = $("#category").val();
                                                                var markup = "<tr><td><input type='checkbox' name='record'></td>" + "<td><input type='text' name='quantity[]' value='"+ quantity +"'></td>" + "<td> <input type='text' name='category[]' value='"+ category +"'></td></tr>";
                                                                $("table tbody").append(markup);
                                                            });
                                                            
                                                            /* Find and remove selected table rows */
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
                                                    
                                                    <div class="form-group">                                              
                                                        <button type="submit" class="btn btn-primary mb-3 float-right" id="btnsubmit">Add Offer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-2 col-ml-2 col-mdl-4 col-sm-6 mt-5">
                                <a href="index.php"><button type="button" class="btn btn-primary mb-3 float-right">Back</button></a>                                                 
                                <span id='loading' style="display:none" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved. Template by <a href="https://abinshsonar.com">Abinash Sonar</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include '../pages/footer.php';
?>