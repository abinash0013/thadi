<?php
    include '../pages/header.php';
?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $resultdata = $con->query("SELECT * from `tbl_user` order by userId desc");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ///////////////////delete  up funcation////////////////// -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> </head>
<script>
    function deletefun(param1){ 
        $("#loading").show();
        $.ajax({
            url: "api/delete-api.php",
            type: "POST",
            dataType:"JSON",
            data: "id=" + param1,
            success: function(data)
            {
                $("#loading").hide();
                if(data.status == 200)
                {
                  location.reload(true);
                }
                else
                {
                  alert(data.messaage);
                }
            },
            // error: function(e) 
            // {
                   
            // }          
        });
    }
</script> 
<!-- //////////////////delete   funcation//////////////////////////// -->

        <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>User</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!--<img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">-->
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!--<a class="dropdown-item" href="#">Message</a>-->
                                <!--<a class="dropdown-item" href="#">Settings</a>-->
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Primary table start -->
                            <!--<div class="col-xl-3 col-ml-3 col-mdl-4 col-sm-6 mt-5">                                -->
                            <!--        <a href="add.php"><button type="button" class="btn btn-primary mb-3 float-right">Add Card</button></a>                             -->
                            <!--    </div>-->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">List of User</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!--<th>Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($result as $value){?>
                                                <form action="#"  method="post">
                                                <tr>                                                   
                                                    <td><?php echo $i=$i+1?></td>
                                                    <td><?php echo $value['name']; ?></td>
                                                    <td><?php echo $value['email']; ?></td>
                                                    <td><?php echo $value['mobile']; ?></td>
                                                    
                                                    <!--<td>-->
                                                    <!--    <ul class="d-flex justify-content-center">-->
                                                    <!--        <li class="mr-3"><a href="view.php?id=<?php echo $value['userId']; ?> &Q=<?php echo $value['userId']?>"><span class="status-p bg-info"><i class="ti-share"></i></span></a></li>-->
                                                    <!--        <li class="mr-3"><span class="status-p bg-danger" data-toggle="modal" data-target="#deletemodel"><i class="ti-trash"></i></span></li>-->
                                                    <!--        <div class="modal fade" id="deletemodel">-->
                                                    <!--            <div class="modal-dialog">-->
                                                    <!--                <div class="modal-content">-->
                                                    <!--                    <div class="modal-header">-->
                                                    <!--                        <h5 class="modal-title text-center text-danger">Delete User</h5>-->
                                                    <!--                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->
                                                    <!--                    </div>-->
                                                    <!--                    <div class="modal-body">-->
                                                    <!--                        <p class="text-center text-boldr">Oops...! You want to Delete this User</p>-->
                                                    <!--                    </div>-->
                                                    <!--                    <div class="modal-footer">-->
                                                    <!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>-->
                                                    <!--                        <button type="button" class="btn btn-primary" onclick="deletefun(<?php echo $value['id'];?>)">Sure</button>-->
                                                    <!--                    </div>-->
                                                    <!--                </div>-->
                                                    <!--            </div>-->
                                                    <!--        </div>-->
                                                    <!--    </ul>-->
                                                    <!--</td>-->
                                                </tr>
                                          </form>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved.</p>
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