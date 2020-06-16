<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                                        $mail=$_SESSION['email'];
                                    include_once 'connection.php';
                                    $qry="select * from maadmin where email='$mail'";
                                
                                    $res= mysqli_query($con,$qry);
                      
                     
                                    $row=mysqli_fetch_array($res);
                                    
//here we are shoing the value of session threw login
                ?>
                  <i class="mdi mdi-account"><?php echo $_SESSION['uname'];?></i>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-custom sidebar" role="navigation">
                <div class="sidebar-nav bg-success navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                    <ul class="nav in" id="side-menu">
                       
                      <li>
                            <a href="registerma.php"><i class="fa fa-dashboard fa-fw"></i> Register area admin</a>
                        </li>
                       <!-- <li>
                            <a href="category.php"><i class="fa fa-puzzle-piece fa-fw"></i> Sellers request</a>
                              </li> -->
                            <!-- /.nav-second-level -->
                     
                       
                       <!--
                        <li>
                            <a href="product.php"><i class="fa fa-pinterest fa-fw"></i> Product</a>
                           
                            
                        </li>
                    -->
                      

                      <!--
                        <li>
                            <a href="users.php"><i class="fa fa-users fa-fw"></i> Users</a>
                          
                            
                        </li>
                    -->
                    <!--
                        <li>
                            <a href="#"><i class="fa fa-truck fa-fw"></i> Orders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                             
                                <li>
                                    <a href="pending_order.php">Show Pending Order</a>
                                </li>
                                <li>
                                    <a href="finish_order.php">Show Finish Order</a>
                                </li>
                            </ul>
                            
                        </li>
                    -->


                        <!--
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="blank.html">Category Wise</a>
                                </li>
                                <li>
                                    <a href="blank.html">Product Wise</a>
                                </li>
                                <li>
                                    <a href="blank.html">Price Wise</a>
                                </li>
                                <li>
                                    <a href="blank.html">Date Wise</a>
                                </li>
                                <li>
                                    <a href="blank.html">Month Wise</a>
                                </li>
                            </ul>
                            
                        </li>-->
                          <li>
                            <a href="malogout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                          
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>