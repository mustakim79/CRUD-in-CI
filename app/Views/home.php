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
    <title>Home</title>
</head>

<body>
    <div class="container">

        <?php
        $session = session();
        if ($session->has('user')) :
        ?>

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
        <?php
            echo  "<h1>Welcome " . $session->get('user') . "</h1>";
            echo '<a href="' . route_to("logout") . '" class="btn btn-outline-primary">Logout</a><br>';
            echo '<a href="' . route_to("Update") . '" class="btn btn-outline-primary">Update</a>';
        else :
            echo "<h1>Login Please</h1>";
        ?>
        <a href="login">Click for Login</a>
        <?php
        endif;
        ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>