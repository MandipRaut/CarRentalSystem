<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>Admin Dashboard</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('includes/header.php');?>

    <div class="ts-main-content">
<?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Dashboard</h2>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">12</div>
                                                    <div class="stat-panel-title text-uppercase">Reg Users</div>
                                                </div>
                                            </div>
                                            <a href="reg-users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-success text-light">
                                                <div class="stat-panel text-center">
                                        
                                                    <div class="stat-panel-number h1 ">13</div>
                                                    <div class="stat-panel-title text-uppercase">Listed Vehicles</div>
                                                </div>
                                            </div>
                                            <a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">14</div>
                                                    <div class="stat-panel-title text-uppercase">Total Bookings</div>
                                                </div>
                                            </div>
                                            <a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-warning text-light">
                                                <div class="stat-panel text-center">                                            
                                                    <div class="stat-panel-number h1 ">15</div>
                                                    <div class="stat-panel-title text-uppercase">Listed Brands</div>
                                                </div>
                                            </div>
                                            <a href="manage-brands.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



<div class="row">
                    <div class="col-md-12">

                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">16</div>
                                                    <div class="stat-panel-title text-uppercase">Subscibers</div>
                                                </div>
                                            </div>
                                            <a href="manage-subscribers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-success text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">17</div>
                                                    <div class="stat-panel-title text-uppercase">Queries</div>
                                                </div>
                                            </div>
                                            <a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">19</div>
                                                    <div class="stat-panel-title text-uppercase">Testimonials</div>
                                                </div>
                                            </div>
                                            <a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
