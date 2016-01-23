<?php
$con=mysqli_connect("mysql.hostinger.in","u380653844_yusuf","FaizPassword","u380653844_faiz");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $msg = false;

if($_POST)
{
  $raw_data = $_POST;

  function sanitize($v)
  {
    return addslashes($v);
  }

  $data = array_map("sanitize",$raw_data);

  extract($data);

$transport = ($transport == 'Yes') ? 'Transporter' : 'Pick Up';


$sql = "INSERT INTO thalilist (
                                        `NAME`,
                                        `CONTACT`,
                                        `ITS_No`,
                                        `Full_Address`,
                                        `Email_ID`,
                                        `WATAN`,
                                        `Transporter`)
                            VALUES (
                                    '$firstname $fathername $lastname',
                                    '$mobile',
                                    '$its',
                                    '$address',
                                    '$email',
                                    '$watan',
                                    '$transport'
                                    )";
  $msg = true;
  mysqli_query($con,$sql) or die(mysqli_error($con));
  mysqli_close($con);

}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">\
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Thali registration form</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <style type="text/css">
      body { 
            /*background-image: url('assets/background.jpg');*/
            background-attachment: fixed;
        }
        .container {
            background-color: #FCFCE4;
            padding-top: 1em;
            padding-bottom: 1em;
        }
        .required
        {
          color: red;
        }

    </style>
  </head>

  <body>

    <div class="container drop-shadow">
      <?php if($msg):?>
      <div class="alert alert-success">
        <strong>Registration Successful!</strong> Please visit faiz to activate your thali.
      </div>
    <?php endif; ?>

      <div class="header" style="text-align: center; vertical-align: middle; font-weight:20px">
        <h2 class="text-muted"><strong>Thali Registration</strong></h2>
      </div>

      <form method="post">
        <div class='col-xs-12'>
            <div class="form-group col-xs-4">
              <label for="firstname">First Name <a class="required">*</a></label>
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group col-xs-4">
              <label for="fathername">Father's Name <a class="required">*</a></label>
              <input type="text" class="form-control" id="fathername" name="fathername" required>
            </div>
            <div class="form-group col-xs-4">
              <label for="lastname">Last Name <a class="required">*</a></label>
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group col-xs-4">
              <label for="its">ITS Id <a class="required">*</a></label>
              <input type="text" class="form-control" id="its" name="its" pattern="[0-9]{8}" required>
            </div>
            <div class="form-group col-xs-12">
              <label for="address">Address <a class="required">*</a></label>
              <!-- <input type="text" class="form-control" id="address1" name="address1" required>
              <input type="text" class="form-control" id="address2" name="address2" required style="margin-top : 5px">
              <input type="text" class="form-control" id="address3" name="address3" required style="margin-top : 5px"> -->

              <textarea class="form-control" rows="3" id="address" name="address" required></textarea>
              <p class="help-block">Please enter in this order-FLAT No, Floor No, Bldg No, SOCIETY Name, ROAD, Nearest LANDMARK</p>
            </div>
            <div class="form-group col-xs-6">
              <label for="mobile">Mobile Number <a class="required">*</a></label>
              <input type="text" class="form-control" id="mobile" name="mobile" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group col-xs-6">
              <label for="email">Email Address <a class="required">*</a></label>(only Gmail)
              <input type="email" class="form-control" id="Email" name="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@gmail.com$" required>
            </div>
            <div class="form-group col-xs-6">
              <label for="watan">Watan <a class="required">*</a></label>
              <input type="text" class="form-control" id="watan" name="watan" required>
            </div>
            <div class="form-group col-xs-12">
              <label>Transport Required <a class="required">*</a> : </label>
              <label class="radio-inline">
                <input type="radio" name="transport" value="Yes" required>Yes
              </label>
              <label class="radio-inline">
                <input type="radio" name="transport" value="No" required>No
              </label>
            </div>
            <div class="form-group col-xs-12">
              <label>Occupation <a class="required">*</a> : </label>
              <label class="radio-inline">
                <input type="radio" name="occupation" value="Student" required>Student
              </label>
              <label class="radio-inline">
                <input type="radio" name="occupation" value="Working Professional" required>Working Professional
              </label>
            </div>
            <div class="form-group col-xs-12" style="text-align: center; vertical-align: middle; font-weight:20px">
              <button type="submit" class="btn btn-success">Submit Request</button>
            </div>
        </div>
      </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body></html>