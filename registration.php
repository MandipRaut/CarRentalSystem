<?php
if(isset($_POST['signup']))
{
    $fname=$_POST['fullname'];
    // Check if the full name contains only letters and spaces
    if(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        echo "<script>alert('Full Name can only contain letters and spaces');</script>";
    } else {
        $email=$_POST['emailid']; 
        $mobile=$_POST['mobileno'];
        $password=$_POST['password']; 
        $license=$_POST['licenseno'];
        $sql="INSERT INTO users(FullName,EmailId,ContactNo,LicenseNo,Password) VALUES(:fname,:email,:mobile,:license,:password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':license',$license,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo "<script>alert('Registration successful. Now you can login');</script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
?>



<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "checkAvailable.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

function checkPasswordMatch() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpassword").value;
    
    if (password !== confirmPassword) {
        document.getElementById("password-match-msg").innerText = "Password and Confirm Password do not match";
        $('#submit').prop('disabled',true);

    } else {
        document.getElementById("password-match-msg").innerText = "";
        $('#submit').prop('disabled',false);

    }
}

function checkPasswordStrength() {
    var password = document.getElementById("password").value;
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;

    if (!regex.test(password)) {
        document.getElementById("password-strength-msg").innerText = "Password must contain at least one lowercase letter, one uppercase letter, one number, one special character, and be at least 8 characters long";
    } else {
        document.getElementById("password-strength-msg").innerText = "";
    }
}


function checkFullName() {
    var fullName = document.getElementById("fullname").value;
    var regex = /^[a-zA-Z ]*$/;
    if (!regex.test(fullName)) {
        document.getElementById("fullname-validation-msg").innerText = "Full Name can only contain letters and spaces";
        $('#submit').prop('disabled',true);
        return false; // Return false to prevent form submission
    } else {
        document.getElementById("fullname-validation-msg").innerText = "";
        $('#submit').prop('disabled',false);

        return true; // Return true if full name is valid
    }
}
</script>

<script type="text/javascript">
function valid() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpassword").value;
    console.log("change");
    if (password !== confirmPassword) {
        alert("Password and Confirm Password Field do not match!!");
        document.getElementById("confirmpassword").focus();
        return false; // Return false to prevent form submission
    }
    return true; // Return true if passwords match
}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" id = "fullname" name="fullname" onblur="checkFullName()" placeholder="Full Name" required="required">
                  <span id="fullname-validation-msg" style="font-size:12px;"></span>
                </div>
                      <div class="form-group">
                  <input type="number" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" minlength="10"  required="required">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="licenseno" placeholder="License Number" maxlength="10" minlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="8" required="required" oninput="checkPasswordStrength()">
                  <span id="password-strength-msg" style="font-size:12px;"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" minlength="8" required="required" oninput="checkPasswordMatch()">
                  <span id="password-match-msg" style="font-size:12px;"></span>
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>
