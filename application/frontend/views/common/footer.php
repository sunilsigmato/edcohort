<?php
require_once APPPATH.'third_party/Facebook/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => fbAppId,
    'app_secret' => fbAppSecret,
    'default_graph_version' => 'v2.2',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; 
$loginUrl = $helper->getLoginUrl(base_url().'facebook-login/', $permissions);
$authUrl = $loginUrl;
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
include_once APPPATH.'third_party/google-api-php-client-2/vendor/autoload.php';
$clientId = GoogleClientId;
$clientSecret = GoogleClientSecret;
$redirectUrl1 = base_url().'google-login';
// Google Client Configuration
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Edcohort');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl1);
$gClient->setScopes(array(
                "https://www.googleapis.com/auth/plus.login",
                "https://www.googleapis.com/auth/userinfo.email",
                "https://www.googleapis.com/auth/userinfo.profile",
                "https://www.googleapis.com/auth/plus.me"
                ));
$authUrl1 = $gClient->createAuthUrl();
?>

<!--footer start-->
<div class="content-bg-color">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 footer-icons pt-3">
                <i class="upper-cnct-us">Contact Us</i>
                <i class="fa-solid fa-envelope fa-lg"><span class="upper-cnct-font"> support@edohort.com </span></i>
                <i class="fa-brands fa-square-twitter fa-lg icon-align "> <span class="upper-cnct-font">
                        support_edcohort </span></i>
            </div>
        </div>
    </div>

   
    <div class="hr-dynamic">
    </div>
    <div class="container ">
        <div class="row">
            <div class=" col-6 col-md-3 ">
                <div class="footer-menu-head pb-3">
                    <h2>Menu 101 </h2>
                </div>
                <ul class="footer-menu-sub">
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>

                </ul>

            </div>
            <div class="col-6 col-md-3">
                <div class="footer-menu-head pb-3">
                    <h2>Menu 101 </h2>
                </div>
                <ul class="footer-menu-sub">
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                </ul>


                <div class="footer-menu-head pb-3">
                    <h2>Menu 101 </h2>
                </div>
                <ul class="footer-menu-sub">
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                </ul>
            </div>
            <div class=" col-6 col-md-3">
                <div class="footer-menu-head pb-3">
                    <h2>Menu 101 </h2>
                </div>
                <ul class="footer-menu-sub">
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                </ul>


                <div class="footer-menu-head pb-3">
                    <h2>Menu 101 </h2>
                </div>
                <ul class="footer-menu-sub">
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                    <li> <a href="#">Contact Us</a> </li>
                    <li> <a href="#">Join us</a> </li>
                    <li> <a href="#">About Us</a> </li>
                </ul>
            </div>
            <div class=" col-12 col-md-3">
                <div class="footer-menu-head pb-3">
                    <h2>Let's Stay Connected </h2>
                    <div class="footer-menu-sub">
                        <h6> Want to Know what we're up to </h6>
                    </div>
                    <div class="footer-menu-sub">
                        <input type="text" placeholder=" Email Address">
                    </div>
                    <div class="footer-menu-sub pt-3">
                        <input type="button" value="Subscribe" class="img-btn-explore">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container ">
        <div class="row pb-3">
            <div class="col-12 col-md-10 pt-3">
                <div class="footer-logo ">Copyright © 2023. All Rights Reserved by Edcohort. Designed & Developed by
                    Sigmato Solution Pvt Ltd </div>

            </div>
            <div class="col-md-2 footer-icons pt-3">
                <i class="fa-brands fa-square-facebook fa-2xl icon-align"></i>
                <i class="fa-brands fa-square-instagram fa-2xl icon-align"></i>
                <i class="fa-brands fa-square-youtube fa-2xl icon-align"></i>
                <i class="fa-brands fa-square-twitter fa-2xl icon-align"></i>
                <i class="fa-brands fa-linkedin fa-2xl"></i>
            </div>
        </div>
    </div>
</div>
<!--<div class="footer">

    <div class="footer-logo"><img src="<?php //echo base_url(); ?>assets/images/footer-logo.png" alt=""></div>

    <div class="footer-menu">
    <div class="container d-flex">

        <div class="footer-menu-col">
            <a href="#">Brands</a>
        </div>

        <div class="footer-menu-col">
            <a href="#">Courses</a>
        </div>

        <div class="footer-menu-col">
            <a href="#">Blogs</a>
        </div>

        <div class="footer-menu-col">
            <a href="#">Join us!</a>
            <a href="#">About us</a>
            <a href="#">Contact Us</a>
        </div>

    </div>
    </div>

</div> -->
<!--footer end-->


</div>
<!--wrapper end-->

<!-- Login|Signup Popup -->

<!-- Vertically centered modal -->

<!-- Login Modal -->
<div class="modal fade login-popup" id="login-button" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">

                <form id="loginPopup" action="javascript:void(0)" method="post">
                    <div class="alert alert-outline alert-outline-success login-message-success"
                        id="#login-message-success" role="alert" style="display:none;"><button type="button"
                            class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        <p id="text-message-login-success"></p>
                    </div>
                    <div class="alert alert-outline alert-outline-danger login-message-error" id="#login-message-error"
                        role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert"
                            aria-hidden="true">×</button>
                        <p id="text-message-login-error"></p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="username" name="username"
                            placeholder="Example@gmail.com" />
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="******" />
                    </div>
                    <div class="mb-4">
                        <label class="form-label"></label>
                        <button type="submit" onclick="loginPopup()" class="form-control login-btn">Login</button>
                    </div>
                   <!-- <div class="mb-4">
                        <a href="<?php echo base_url(); ?>forgot-password" class="forget-pass">Forget Password?</a>
                    </div> -->
                   <!-- <div class="double-line">
                        <p class="text-center">Or</p>
                    </div>
                    <div class="mb-4">
                        <div class="social-login">
                            <div class="social-icon mt-4">
                                <a href="<?php echo $authUrl1; ?>"><img
                                        src="<?php echo base_url(); ?>assets/images/google.png"></a>
                            </div>
                            <div class="social-icon facebook-color mt-4">
                                <a href="<?php echo $authUrl; ?>"><img
                                        src="<?php echo base_url(); ?>assets/images/facebook.png"></a>
                            </div>
                        </div>
                    </div> -->
                    <!--        <div class="mb-t mb-4">
                <div class="login-number text-center">
                    <a href="#">Login with Phone Number</a>
                </div>
            </div> -->
                   <!--- <div class="form-group mt-4 terms-check">
                        <input class="form-check-input" type="checkbox" id="checkbox624">
                        <label for="checkbox624" class="form-check-label white-text">I Agree all Terms and
                            Condtion</label>
                    </div>
                    <div class="form-group mt-2 terms-check">
                        <input class="form-check-input" type="checkbox" id="checkbox624">
                        <label for="checkbox624" class="form-check-label white-text">Subscribe to Edcohort
                            newsletter</label>
                    </div> -->
                    <!--        <div class="mt-4">
                <div class="login-counsellor text-center">
                    <a href="#">I am a Counsellor</a>
                </div>
            </div> -->
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Signup Modal -->
<div class="modal fade login-popup" id="signup-button" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <form id="register" action="javascript:void(0)" method="post">
                    <input type="hidden" name="role_id" id="role_id">
                    <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success"
                        role="alert" style="display:none;"><button type="button" class="close" data-bs-dismiss="alert"
                            aria-hidden="true">×</button>
                        <p id="text-message-success"></p>
                    </div>
                    <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error"
                        role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert"
                            aria-hidden="true">×</button>
                        <p id="text-message-error"></p>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="sign_up_name" name="name" placeholder="Name"
                                required />
                        </div>
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="sign_up_email" name="email"
                                placeholder="Example@gmail.com" required />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="sign_up_phone" placeholder="Phone"
                            required />
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="sign_up_password" required
                                placeholder="******" />
                        </div>
                        <div class="col">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirm"
                                id="sign_up_password_confirm" required placeholder="******" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label"></label>
                        <button type="submit" onclick="registration()" id="registraton"
                            class="form-control login-btn">Sign Up</button>
                    </div>
                  <!--  <div class="double-line">
                        <p class="text-center">Or</p>
                    </div>
                    <div class="mb-4">
                        <div class="social-login">
                            <div class="social-icon mt-4">
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/google.png"></a>
                            </div>
                            <div class="social-icon facebook-color mt-4">
                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/facebook.png"></a>
                            </div>
                        </div>
                    </div>  -->
                    <!--       <div class="mb-t mb-4">
                <div class="login-number text-center">
                    <a href="#">Login with Phone Number</a>
                </div>
            </div> -->
                   <!-- <div class="form-group mt-4 terms-check">
                        <input class="form-check-input" type="checkbox" id="checkbox624">
                        <label for="checkbox624" class="form-check-label white-text">I Agree all Terms and
                            Condtion</label>
                    </div>
                    <div class="form-group mt-2 terms-check">
                        <input class="form-check-input" type="checkbox" id="checkbox624">
                        <label for="checkbox624" class="form-check-label white-text">Subscribe to Edcohort
                            newsletter</label>
                    </div>  -->
                </form>
            </div>
        </div>
    </div>
</div>


<!--libs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<!--plugin js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js'></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owlcarousel/owl.carousel.min.js"></script>

  <!--Select2 js -->
  <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>
    
<script type="text/javascript">
function registration() {

    // alert();  
    //$(".alert-outline-success").hide();
    //$("#text-message-success").html(''); 


    var value_form = $('#register').serialize();

    $.ajax({
        url: base_url + 'signup-submit',
        dataType: 'json',
        type: 'post',
        data: value_form,
        success: function(data) {
            if (data.status == '1') {
                $(".reg-message-success").show();
                $("#text-message-success").html(data.message);
                setTimeout(function() {
                    location.reload();
                    $(".reg-message-success").hide();
                    $("#text-message-success").html('');
                    $("#otpModal").modal('show');
                    $('#otpuserID').val(data.userID);
                    $(".reg-message-success").hide('blind', {}, 300)
                }, 3000);
            } else if (data.status == '0') {
                $(".reg-message-error").show();
                $("#text-message-error").html(data.message);
                setTimeout(function() {
                    $(".reg-message-error").hide();
                    $("#text-message-error").html('');
                    $(".reg-message-error").hide('blind', {}, 500)
                }, 5000);
            }
        },
        beforeSend: function() {
            $("#global-loader").show();
            $("#body").addClass('opacity-body');
        },
        complete: function() {
            $("#global-loader").hide();
            $("#body").removeClass('opacity-body');
        }

    });

}

function login() {

    // alert();  
    //$(".alert-outline-success").hide();
    //$("#text-message-success").html(''); 


    var value_form = $('#login').serialize();

    $.ajax({
        url: base_url + 'login-pop',
        dataType: 'json',
        type: 'post',
        data: value_form,
        success: function(data) {
            if (data.status == '1') {
                window.location.replace(base_url);
                $(".login-message-success").show();
                $("#text-message-login-success").html(data.message);
                setTimeout(function() {
                    $(".login-message-success").hide();
                    $("#text-message-login-success").html('');
                    $(".login-message-success").hide('blind', {}, 500)
                }, 5000);
            } else if (data.status == '0') {
                $(".login-message-error").show();
                $("#text-message-login-error").html(data.message);
                setTimeout(function() {
                    $(".login-message-error").hide();
                    $("#text-message-login-error").html('');
                    $(".login-message-error").hide('blind', {}, 500)
                }, 5000);
            }
        },
        beforeSend: function() {
            $("#global-loader").show();
            $("#body").addClass('opacity-body');
        },
        complete: function() {
            $("#global-loader").hide();
            $("#body").removeClass('opacity-body');
        }

    });

}

function loginPopup() {

    // alert();  
    //$(".alert-outline-success").hide();
    //$("#text-message-success").html(''); 


    var value_form = $('#loginPopup').serialize();

    $.ajax({
        url: base_url + 'login-pop',
        dataType: 'json',
        type: 'post',
        data: value_form,
        success: function(data) {
            if (data.status == '1') {
                location.reload();
                //window.location.replace(base_url);
                $(".login-message-success").show();
                $("#text-message-login-success").html(data.message);
                setTimeout(function() {
                    $(".login-message-success").hide();
                    $("#text-message-login-success").html('');
                    $("#otpModal").modal('show');
                    $(".login-message-success").hide('blind', {}, 500)
                }, 5000);
            } else if (data.status == '0') {
                $(".login-message-error").show();
                $("#text-message-login-error").html(data.message);
                setTimeout(function() {
                    $(".login-message-error").hide();
                    $("#text-message-login-error").html('');
                    $(".login-message-error").hide('blind', {}, 500)
                }, 5000);
            }
        },
        beforeSend: function() {
            $("#global-loader").show();
            $("#body").addClass('opacity-body');
        },
        complete: function() {
            $("#global-loader").hide();
            $("#body").removeClass('opacity-body');
        }

    });

}
</script>
<script>
// INCLUDE JQUERY & JQUERY UI 1.12.1
$(function() {
    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        duration: "fast"
    });
});



// $( function() {
// 	$('#timepicker').timepicker();
//     $('#timepickerend').timepicker();
// } );
// 
</script>
<!-- <script type="text/javascript">
    window.onscroll = function() {myFunction()};

var header = document.getElementById("sideleft-fix");
var sticky = header.offsetTop;

function myFunction() {

  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
  if($(window).width() < 992) {
    if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
}
</script> -->


</body>

</html>