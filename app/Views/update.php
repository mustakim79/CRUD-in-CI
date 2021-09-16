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
    <title>Update User</title>
</head>

<body>
    <div class="container">
        <?php
        if (session()->has('msg')) {
            echo session()->getFlashdata('msg') == "Updated" ? "<div class='alert alert-success'role='alert'>Updated Successfuly</div>" : "<div class='alert alert-warning' role='alert'>Can not updated</div>";
        }
        ?>
        <form action="UpdateData" method="post">
            <?= csrf_field() ?>
            <div class="col-md-6 offset-md-3 my-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Update</h2>
                    </div>

                    <?php
                    foreach ($rs->getResult() as $row) :
                        // echo $row->name . "<br>";
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Enter username</label>
                            <input id="name" name="name" class="form-control" type="text" pattern="[A-Za-z]{2,15}"
                                required value="<?= $row->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="emlid">Enter email</label>
                            <input id="emlid" class="form-control" type="email" required name="email"
                                value="<?= $row->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Enter password</label>
                            <input id="password" class="form-control" type="text" required maxlength="20"
                                value="<?= $row->password ?>" name="password">
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
            <a href="/register">Register</a><br>

        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>