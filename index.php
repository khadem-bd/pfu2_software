<!doctype html>
<html>
<?php
    include "bundling.php";  
?>
<body class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 login-bg full-height"></div>
            <div class="col-sm-12 col-md-9 col-lg-9 full-height">
                <div class="content">
                    <img src="images/logo.png">
                    <h1>Sign In</h1>
                    <div id="signinSuccess" class="success"></div>
                    <div id="signinError" class="error"></div>
                    <form id="signinForm">
                    <div class="login-form">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email ID">
                            <span class="icon-user icon"></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Your Password">
                            <span class="icon-lock icon"></span>
                        </div>
                        <div class="mt-5">
                            <input type="submit" class="btn btn-primary" value="Sign In">                           
                        </div>  
                    </div>          
                    </form>                                      
                </div>
            </div>
        </div>
    </div>
</body>
</html>