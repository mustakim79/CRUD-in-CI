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
    <title>Forgot Password</title>
</head>

<body>
    <div class="container">
        <form method="post" action="/Forgotpass">
            <div class="col-md-6 offset-md-3 my-5">
                <?php
                $session = session();
                if ($session->has('msg')) :
                ?>
                <div class="alert alert-primary" role="alert">
                    <?= $session->getFlashdata('msg') ?>
                </div>
                <?php
                endif;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h1>Forgot Password</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Enter your email</label>
                            <input id="email" class="form-control" type="email" name="email" required>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
            <a href="/register">register</a><br>
            <a href="/login">Login</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>