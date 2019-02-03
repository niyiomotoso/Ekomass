<?php
  if (isset($_GET['updated'])) {
           echo" <div class=\"alert alert-success\">
              <strong>YOUR PROFILE HAS BEEN  SUCCESSFULLY UPDATED</strong> 
      </div>";
        }
        elseif (isset($_GET['passwordnotsame'])) {
           echo" <div class=\"alert alert-danger\">
              <strong>Passwords do not correlate</strong> 
      </div>";
        }
        elseif (isset($_GET['email'])) {
           echo" <div class=\"alert alert-danger\">
              <strong>Email already exist on this server, use another one</strong> 
      </div>";
        }
        elseif (isset($_GET['username'])) {
           echo" <div class=\"alert alert-danger\">
              <strong>Username already exist on this server, use another one</strong> 
      </div>";
        }
        elseif (isset($_GET['phone'])) {
           echo" <div class=\"alert alert-danger\">
              <strong>Phone Number already exist on this server, use another one</strong> 
      </div>";
        }
        elseif (isset($_GET['posted'])) {
           echo" <br><div class=\"alert alert-info center\">
              <strong>CONGRATULATIONS! YOUR TIP HAS BEEN SUCCESSFULLY POSTED</strong> 
      </div>";
        }
        elseif (isset($_GET['referred'])) {
           echo" <br><div class=\"alert alert-info center\">
              <strong>Request Successful!</strong> 
      </div>";
        }
        elseif (isset($_GET['invalid'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>***invalid login credentials***</strong> 
            </div>";
            }


             elseif (isset($_GET['notcomfirmed'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>Account not yet verified, please wait for your verification</strong> 
            </div>";
            }

            elseif (isset($_GET['passwordreset'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>***PASSWORD SUCCESSFULLY CHANGED, login below***</strong> 
            </div>";
            }

             elseif (isset($_GET['registered'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>ACCOUNT SUCCESSFULLY CREATED, Sign in to your account below</strong> 
            </div>";
            } 

        elseif (isset($_GET['notreferred'])) {
           echo" <br><div class=\"alert alert-danger center\">
              <strong>No Invitation Request Submitted for You!</strong> 
      </div>";
        }
        elseif (isset($_GET['intersect'])) {
           echo" <br><div class=\"alert alert-danger center\">
              <strong>You cant select more than one options for same item!</strong> 
      </div>";
        }
     
          elseif (isset($_GET['emailnotfound'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>***email or phone not found on the server***</strong> 
            </div>";
            }
            elseif (isset($_GET['invalidcode'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>***the verification code entered is INcorrect***</strong> 
            </div>";
            }
            
            elseif (isset($_GET['smserroroccured'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>***Error occured while sending SMS, try again later***</strong> 
            </div>";
            }
            elseif (isset($_GET['emailsent'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>***Your password has been sent to your mail****</strong> 
            </div>";
            } 
            elseif (isset($_GET['tryagain'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>***pls try again, problem with server****</strong> 
            </div>";
            }
            elseif (isset($_GET['done'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>****done***</strong> 
            </div>";
            }

            elseif (isset($_GET['noaddress'])) {
           echo" <div class=\"alert alert-danger\">
                            <strong>Update your shipping details</strong> 
            </div>";
            }
             elseif (isset($_GET['orderplaced'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>Your order was placed successfully</strong> 
            </div>";
            }
             elseif (isset($_GET['salessaved'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>Sales and expenditure saved successfully</strong> 
            </div>";
            }
             elseif (isset($_GET['productstored'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>Product uploaded successfully</strong> 
            </div>";
            }
             elseif (isset($_GET['select'])) {
           echo" <div class=\"alert alert-success\">
                            <strong>click on the item name from the list below</strong> 
            </div>";
            }
            
            
         
           
?>