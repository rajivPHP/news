<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php
        include_once("config/config.php");
        echo $site_name; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="templates/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/startbootstrap-sb-admin-2-1.0.8/bower_components/font-awesome/css/font-awesome.min.css"
          rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/>

    <!-- Chosen Library CSS -->
    <link href="js/chosen_v1.5.0/chosen.min.css" rel="stylesheet" type="text/css">

    <!-- Notification library CSS  -->
    <link href="js/jQuery-Notification-Alert/alert/css/alert.css" rel="stylesheet" type="text/css">
    <link href="js/jQuery-Notification-Alert/alert/themes/default/theme.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form action="pages/check_login.php" method="post" class="form-horizontal" id="login">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Username" name="username" type="text"
                                       id="inputUsername" data-toggle="tooltip" data-placement="left" title="username"
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       value="" id="inputPassword" data-toggle="tooltip" data-placement="left"
                                       title="Password">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_category" id="inputCategory"
                                        data-toggle="tooltip" data-placement="left" title="Select Category">
                                    <option value="">Select Category</option>
                                    <option value="0">admin</option>
                                    <option value="1">user</option>
                                </select>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" type="button" data-toggle="tooltip"
                                    data-placement="left" title="Sign" id="submit">
                                Sign in
                            </button>
                            <button class="btn btn-lg btn-success btn-block" type="button" data-toggle="tooltip"
                                    data-placement="left" title="User Registration">
                                User Registration
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="templates/startbootstrap-sb-admin-2-1.0.8/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="templates/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="templates/startbootstrap-sb-admin-2-1.0.8/dist/js/sb-admin-2.js"></script>

<!-- Chosen Library Plugin -->
<script src="js/chosen_v1.5.0/chosen.jquery.js"></script>

<!-- Notification Plugin -->
<script src="js/jQuery-Notification-Alert/alert/js/alert.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        //Chosen Plugin
        $("#inputCategory").chosen();
    });

    $('#submit').click(function () {
        var username = $('#inputUsername').val();
        var password = $('#inputPassword').val();
        var category = $('#inputCategory').val();
        //console.log("category",category);
        if (username == "") {
            $.alert.open({
                title:'LOGIN',
                type:'warning',
                content: 'Enter the username',
                icon:'warning',
                cancel:'true'
            });
            //alert("Enter the Username");
            return false;
        } else if (password == "") {
            $.alert.open({
                title:'LOGIN',
                type:'warning',
                content: 'Enter the password',
                icon:'warning',
                cancel:'true'
            });
            // alert("Enter the Password");
            return false;
        }
        else if (category == "") {
            $.alert.open({
                title:'LOGIN',
                type:'warning',
                content: 'Select the Category of user',
                icon:'warning',
                cancel:'true'
            });
            //alert("Select the Category of user");
            return false;
        } else {
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
