<?php
// Check if the login form is submitted
if(isset($_POST['login']))
{
    // Retrieve email and password from the form
    $email=$_POST['email'];
    $password=$_POST['password'];    
    // SQL query to select user details based on email and password
    $sql ="SELECT EmailId,Password,FullName FROM users WHERE EmailId=:email and Password=:password";    
    // Prepare the SQL query
    $query= $dbh -> prepare($sql);    
    // Bind parameters to prevent SQL injection
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);    
    // Execute the query
    $query-> execute();    
    // Fetch the results
    $results=$query->fetchAll(PDO::FETCH_OBJ);    
    // Check if any row is returned
    if($query->rowCount() > 0)
    {       // Start session and set session variables
        $_SESSION['login']=$_POST['email'];
        $_SESSION['fname']=$results->FullName;        
        // Redirect user to the current page
        $currentpage=$_SERVER['REQUEST_URI'];
        echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    } 
    else
    {          // Display alert for invalid login details
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">
               
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>
