<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>এসায়েনমেন্ট 4</title>
  </head>

  <body style="
      background-image: url(banner-min1.jpg);
      background-color: #202020;
      height: 500px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      padding-bottom: 30px;
      ">

      <!-- header option start -->
      <div class="container">
        <h1 class="text-center py-3 bg-warning mt-2 mb-0">এসাইনমেন্ট 4</h1>
        <p class="bg-info p-3">
            - ফরম ভেলু গেট
            - ফরম ভেলিডেসন গ্লোবাল
            - ফরম ফিল্ড ভেলিডেসন
            - ইমেইল ভেলিডেসন
            - স্পেসিফিক ইমেইল ভেলিডেসন
            - ফোন নাম্বার ভেলিডেসন
            - বয়স ভেলিডেট করুন যেখানে শুধু মাত্র ১৮ বছরের বেশি এবং ৪০ বছরের কম ইউজার রা সাইনআপ করতে পারবে
            - সাইন আপ করার সময় একটি ম্যাথমেটিকস সলিওসন সিসটেম এড করুন এবং সেটা ভেলিডেট করুন
            - সাথে একটি প্রফাইল ফটো আপলোড করুন এবং জাভাস্ক্রিপ্ট প্রিভিও সিসটেম টাও রেডি করুন
            - স্ট্রিং কেপচা সিসটেম এড করুন এবং সেটার সলিওসন ভেলিডেট করুন
            - ফাইল আপলোডের ক্ষেত্রে ফরমেট ভেলিডেট করুন
            - ৫০০ কিলোবাইট এর বেশি সাইজের ফাইল গুলাকে বাধা দিন
        </p>
      </div>
      <!-- header option end -->



      <?php


        session_start();

    		/**
    		 * Student Data Form
    		 */
    		 if( isset($_POST['submit']) ){

    			// Form value get
    			$fname = $_POST['fname'];
          $lname = $_POST['lname'];
    			$email = $_POST['email'];
          $password = $_POST['inputPassword'];
    			$phoneno = $_POST['phoneno'];
    			$age = $_POST['age'];
          $session_captcha = $_SESSION['captcha'];
          $form_captcha = $_POST['captcha'];



    			if( isset($email) ){
    				// Check email
    				$email_array = explode('@', $email);
    				$email_type =  end($email_array);

    			}

    			// Cell manage
    			$phoneno_start = substr($phoneno, 0, 3);




          // Photo Uplaod

          $photo = $_FILES['profile_photo'];

     			// Photo info
     			$photo_name = $photo['name'];
     			$photo_tmpname = $photo['tmp_name'];
     			$photo_size = $photo['size'];
     			$size_in_kb = $photo_size/ 1024;


     			// extension
     			$photo_arr = explode('.', $photo_name);
     			$extension = end($photo_arr);

     			// unique file name
     			$unique_name_pro = time() .rand(1, 99999999);
     			$unique_name = md5($unique_name_pro)  . '.' . $extension ;







          if( empty($fname) ){
    					$err['fname'] = "<p style=\" color:red; \"> First name is Required * </p>";
    			}

          if( empty($lname) ){
    					$err['lname'] = "<p style=\" color:red; \"> Last name is Required * </p>";
    			}

    			if( empty($email) ){
    				$err['email'] = "<p style=\" color:red; \"> Email is Required * </p>";
    			}

          if( empty($password) ){
    				$err['inputPassword'] = "<p style=\" color:red; \"> Password is Required * </p>";
    			}

    			if( empty($phoneno) ){
    				$err['phoneno'] = "<p style=\" color:red; \"> Phone number is Required * </p>";
    			}

    			if( empty($age) ){
    				$err['age'] = "<p style=\" color:red; \"> Age is Required * </p>";
    			}

          if( empty($form_captcha) ){
    				$err['captcha'] = "<p style=\" color:red; \"> Captcha is Required * </p>";
    			}

    			/**
    			 * Form validation
    			 */
    			else if( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){

    				$msg =  "<p class=\"text-danger\"> Invalid email address !</p>";

    			}else if($email_type != 'hostysite.com'){

    				$msg = "<p class=\"text-danger\"> Email should be Our Hostysite Company email !</p>";

    			}else if( in_array($phoneno_start, ['017','018','019','015','013','016','014']) == false ){
    				$msg = "<p class=\"text-danger\"> Mobile number is not correct !</p>";

    			}else if($age >= 40 || $age < 18){
    				$msg = "<p class=\"text-danger\"> Age restricted 18-40 years !</p>";

            /**
       			 * Photo validation
       			 */

    			}else if( empty($photo_name) ){
             $msg = "<p class=\"text-danger\"> Please insurt a Photo !</p>";

     			}else if ( in_array($extension, ['jpg','png', 'jpeg']) == false ){
            $msg = "<p class=\"text-danger\"> Please upload only jpg jpeg png !</p>";

     			}else if( $size_in_kb > 500 ){
            $msg = "<p class=\"text-danger\"> Photo size should be lower than 500kb !</p>";

     			}else if( $session_captcha != $form_captcha ){
            $msg = "<p class=\"text-danger\"> Captcha is not match !</p>";

     			}else {
     				move_uploaded_file($photo_tmpname, "uploaded_photos/" . $unique_name );
     				$msg = "<p class=\"text-success\"> Your application is submitted successfully !</p>";

     			}


    		 }

    	?>







        <div class="container">
          <h3 class="text-center py-3 bg-dark mt-2 mb-5 text-light">নিচের ফরমটি সবগুলো প্রশ্নের উত্তর বহন করে</h3>
          <div class="row mt-5">

          <div class="col-md-6 shadow bg-light px-5 pb-5">
            <h3 class="text-center py-3 bg-primary mt-2 mb-5">Application Form</h3>
            <div class="div">
              <?php
                if( isset($msg) ){
                  echo $msg;
                }
              ?>
            </div>
            <form class="row g-3 text-success" action="" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">

                  <label for="fname" class="form-label">First Name</label>
                  <input name="fname" type="text" class="form-control" id="fname">
                  <?php
      							if( isset($err['fname']) ){
      								echo $err['fname'];
      							}
      						?>
                </div>
                <div class="col-md-6">
                  <label for="lname" class="form-label">Last Name</label>
                  <input name="lname" type="text" class="form-control" id="lname">
                  <?php
      							if( isset($err['lname']) ){
      								echo $err['lname'];
      							}
      						?>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="email">
                  <?php
      							if( isset($err['email']) ){
      								echo $err['email'];
      							}
      						?>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword" class="form-label">Password</label>
                  <input name="inputPassword" type="password" class="form-control" id="inputPassword">
                  <?php
      							if( isset($err['inputPassword']) ){
      								echo $err['inputPassword'];
      							}
      						?>
                </div>


                <div class="col-md-6">
                  <label for="phoneno" class="form-label">Mobile Number</label>
                  <input name="phoneno" type="text" class="form-control" id="phoneno">
                  <?php
      							if( isset($err['phoneno']) ){
      								echo $err['phoneno'];
      							}
      						?>
                </div>
                <div class="col-md-6">
                  <label for="age" class="form-label">Your Age</label>
                  <input name="age" type="text" class="form-control" id="age">
                  <?php
      							if( isset($err['age']) ){
      								echo $err['age'];
      							}
      						?>
                </div>
                <div class="col-md-6">
                  <label for="profile_photo"><span style="cursor:pointer;" data-toggle="tooltip" data-placement="right"  title="Add Photo">Upload Your Profile Photo Here</span><img style="cursor:pointer;" data-toggle="tooltip" data-placement="right"  title="Add Photo" width="50" src="image.png" alt=""></label>
    							<input name="profile_photo" style="display:none;" type="file" id="profile_photo">
                </div>
                <div class="col-md-6">
                  <label for="captcha" class="form-label">Humanity Check</label>
                  <img src="captcha.php" alt="">
                  <input name="captcha" type="text" class="form-control" id="captcha" placeholder="Type Captcha">
                  <?php
      							if( isset($err['captcha']) ){
      								echo $err['captcha'];
      							}
      						?>
                </div>
                <div class="col-md-6">
    									<img style="max-width:50%;" id="upload_photo" src="" alt="">
                </div>
                <div class="col-12 form-group">
                  <button name="submit" type="submit" class="btn btn-primary mx-auto">Sign Up</button>
                </div>
            </form>
          </div>
          <div class="col-md-6 shadow bg-light px-5 pb-5">
            <h3 class="text-center py-3 bg-success mt-2 mb-5">Output</h3>
            <div class="row ">
              <img style="max-width:25%;" id="upload_photo" src="" alt="">
              <div class="col-md-4">
                <h6>First Name : </h6>
                <h6>Last Name :</h6>
                <h6>Email ID :</h6>
                <h6>Phone Number :</h6>
                <h6>Age :</h6>
              </div>
              <div class="col-md-4">
                <h6><?php
                  if( isset($fname) ){
                    echo $fname;
                  }
                ?></h6>
                <h6><?php
                  if( isset($lname) ){
                    echo $lname;
                  }
                ?></h6>
                <h6><?php
                  if( isset($email) ){
                    echo $email;
                  }
                ?></h6>
                <h6><?php
                  if( isset($phoneno) ){
                    echo $phoneno;
                  }
                ?></h6>
                <h6><?php
                  if( isset($age) ){
                    echo $age;
                  }
                ?></h6>
              </div>
              <div class="col-md-4">
                <img src="" alt="">
              </div>
            </div>

          </div>
          </div>
        </div>



        <div class="mt-5">

            <p class="bg-info py-3 text-center">All right reserved by Belayet Hossen Biplob</p>


        </div>










      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script>
    		$(function () {
    			$('[data-toggle="tooltip"]').tooltip()
    		})
    		$('input[name="profile_photo"]').change(function(e){
    			let file_url = URL.createObjectURL(e.target.files[0]);
    			$('img#upload_photo').attr('src', file_url);
    		});
    	</script>
    </body>
  </html>
