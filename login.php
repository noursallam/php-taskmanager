

<?php

require('loginhandler.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background: black">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: white">
                    The Best <br />
                    <span style="color: #F4B324">For your team</span>
                </h1>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">





                        <form action="login.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" value="<?php if (isset($_POST['email'])) {
                                    echo $_POST['email'];
                                } ?>"
                                    id="form3Example3" class="form-control" name="email">
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" value="<?php if (isset($_POST['pass'])) {
                                    echo $_POST['pass'];
                                } ?>"
                                    id="form3Example4" class="form-control" name="pass">
                                <label class="form-label " for="form3Example4">password<br><span class="text-secondary">should be bigger than 6</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4" name='login_btn'>
                                login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
