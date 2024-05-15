<?php
session_start();
error_reporting(0);
include('config.php');

function dateDiffInDays($date1, $date2) {
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400));
}

if(strlen($_SESSION['login'])==0)
{
    header('location:index.php');
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
    $cancel_message = $_POST['cancel_message'];
    
    // Perform cancellation logic here
    $sql = "UPDATE booking SET Status = 2, message = :cancel_message WHERE id = :booking_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
    $query->bindParam(':cancel_message', $cancel_message, PDO::PARAM_STR);
    $query->execute();
    
    // Redirect back to the same page after cancellation
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>My Booking</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!--Header-->
<?php include('header.php');?>
<!--Page Header-->
<!-- /Header -->

<!--Page Header-->
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>My Booking</h1>
                <a href="#">Home</a> -> My Booking
            </div>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<?php
$useremail=$_SESSION['login'];
$sql = "SELECT * from users where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
?>
<section class="user_profile inner_pages">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php include('sidebar.php');?>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="profile_wrap">
                    <h5 class="uppercase underline">My Bookings </h5>
                    <div class="my_vehicles_list">
                        <ul class="vehicle_listing">
                            <?php
                            $useremail=$_SESSION['login'];
                            $sql = "SELECT vehicles.Vimage1 as Vimage1,vehicles.VehiclesTitle,vehicles.id as vid,brands.BrandName,booking.FromDate,booking.ToDate,booking.message,booking.Status,booking.id as booking_id, vehicles.PricePerDay from booking join vehicles on booking.VehicleId=vehicles.id join brands on brands.id=vehicles.VehiclesBrand where booking.userEmail=:useremail";
                            $query = $dbh -> prepare($sql);
                            $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0) {
                                foreach($results as $result) { 
                                    $fromDate = date("d/m/Y", strtotime($result->FromDate));
                                    $toDate = date("d/m/Y", strtotime($result->ToDate));
                                    $days = dateDiffInDays($fromDate, $toDate)+1;
                                    $priceperday = $result->PricePerDay;
                                    $totalAmount = $days * $priceperday;
                                    ?>
                                    <li>
                                        <div class="vehicle_img">
                                            <a href="vehDetails.php?vhid=<?php echo htmlentities($result->vid);?>">
                                                <img src="assets/images/<?php echo htmlentities($result->Vimage1);?>" alt="image">
                                            </a>
                                        </div>
                                        <div class="vehicle_title">
                                            <h6><a href="vehDetails.php?vhid=<?php echo htmlentities($result->vid);?>">
                                                    <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?>, <?php echo htmlentities($result->PricePerDay)?>
                                                </a>
                                            </h6>
                                            <p>
                                                <b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br />
                                                <b>To Date:</b> <?php echo htmlentities($result->ToDate);?>
                                                <div>
                                                    <p><b>Total Amount:</b> $<?php echo $totalAmount; ?></p>
                                                </div>
                                            </p>
                                        </div>
                                        <div class="vehicle_status">
                                            <?php if($result->Status==1) { ?>
                                            <p>Pickup Address: Kapan, Kathmandu</p>

                                                <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>

                                            <?php } else if($result->Status==2) { ?>
                                                <a href="#" class="btn outline btn-xs">Cancelled</a>

                                            <?php } else { ?>
                                                <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
                                            <?php } ?>
                                            
                                        </div>
                                        <div style="float: left">
                                            <p><b>Message:</b> <?php echo htmlentities($result->message);?> </p>
                                        </div>
                                        <?php if($result->Status != 2) { ?>
                                            <div>
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <input type="hidden" name="booking_id" value="<?php echo $result->booking_id; ?>">
                                            <div class="form-group">
                                            <label for="cancel_message">Reason for cancellation:</label>
                                            <textarea class="form-control" id="cancel_message" name="cancel_message" rows="3" required></textarea>
                                        </div>
                                              <button type="submit" class="btn btn-danger" onclick="confirmCancellation()">Cancel Booking</button>
                                          </form>
                                            </div>
                                        <?php } ?>
                                        <?php if($result->Status == 1) { ?>
                                          <button class="btn btn-success" onclick="showPayPopup(<?php echo $result->booking_id; ?>,<?php echo $result->FromDate?>)">Pay</button>

                                        <?php } ?>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/my-vehicles-->
<?php include('footer.php');?>
<div id="payPopup" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePayPopup()">&times;</span>
        <p id="payTotal">Total amount: $0</p>
        <button onclick="processPayment()">Proceed to Payment</button>
    </div>
</div>

<script>
    // JavaScript functions for handling pay button and popup
    function showPayPopup(bookingId, FromDate) {
        // Here you can calculate total amount based on booking details
        // For demonstration purposes, let's assume the total is $100
        var totalAmount = 100;
        console.log(FromDate)
        document.getElementById("payTotal").innerText = "Total amount: $" + totalAmount;
        document.getElementById("payPopup").style.display = "block";
    }

    function closePayPopup() {
        document.getElementById("payPopup").style.display = "none";
    }

    function processPayment() {
        // Add code to process payment here
        alert("Payment processed successfully!");
        closePayPopup();
    }

    function confirmCancellation() {
        if (confirm("Are you sure you want to cancel this booking?")) {
            document.getElementById("cancelForm").submit();
        }
    }
</script>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>

<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>
