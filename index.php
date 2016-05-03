<html>
<head>
    <title><?php
        include_once("config/config.php");
        echo $site_name; ?></title>
    <style>
        .login_form {
            margin: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
</head>
<body>
<div class="login_form">
    <form action="pages/check_login.php" method="post" class="form-horizontal" id="login">
        <div class="row">
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">User Name:</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="inputUsername" name="username" size="40" class="form-control input-sm">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Password:</label>
                </div>
                <div class="col-sm-8">
                    <input type="password" class="form-control input-sm" id="inputPassword" placeholder="Password"
                           name="password" size="40">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">User Category:</label>
                </div>
                <div class="col-sm-8">
                    <select name="user_category" class="c-select input-sm" id="inputCategory"/>
                    <option>Select Category</option>
                    <option value="0">admin</option>
                    <option value="1">user</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <button class="btn btn-md btn-primary" type="button" id="submit">Sign in</button>
                    <button class="btn btn-md btn-primary" type="button">User Registration</button>
                </div>
            </div>
        </div>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#submit').click(function () {
        var username = $('#inputUsername').val();
        var password = $('#inputPassword').val();
        var category = $('#inputCategory').val();
        if (username == "") {
            alert("Enter the Username");
            return false;
        }
        else if (password == "") {
            alert("Enter the Password");
            return false;
        }
        else {
            $.ajax({
                url: 'pages/check_login.php',
                data: $("#login").serialize(),
                method: "POST",
                success: function (response) {
                    window.location.replace(response);
                }
            });
        }
    });
</script>
</body>
</html>