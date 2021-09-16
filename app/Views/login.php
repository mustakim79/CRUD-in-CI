<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="/check" method="post">
            <div class="col-md-6 offset-md-3 my-5">
                <?php
                $session = session();
                if ($session->has('msg')) :
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $session->getFlashdata('msg') ?>
                </div>
                <?php
                endif;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Enter username</label>
                            <input id="name" name="name" class="form-control" type="text" pattern="[A-Za-z]{2,15}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="password">Enter password</label>
                            <input id="password" class="form-control" type="password" required maxlength="20"
                                name="password">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </div>
        </form>
        <center>
            <a href="/resetpass">Reset Password</a><br>
            <a href="/register" class="btn btn-outline-primary">Register</a>
        </center>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>