<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php
        include("../../config/config.php");
        echo $site_name;
        ?></title>

    <link rel="shortcut icon" type="image/ico" href="../../images/favicon.ico"/>
    <!-- Bootstrap Core CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.css"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/font-awesome/css/font-awesome.min.css"
          rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
session_start();
if (isset($_SESSION['username'])) {
    ?>
    <div id="wrapper">
        <?php
        include_once("admin_menu.php");
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add News Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                                          name="newscategoryform" id="newscategoryform">
                                        <div class="form-group">
                                            <label>News Category</label>
                                            <input class="form-control" id="newscategory" name="news_category">
                                            <p class="help-block">News category.</p>
                                        </div>
                                        <button type="button" id="submit" class="btn btn-default" name="submit">Submit
                                        </button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <input type="hidden" value="addnewscategory" name="admin_functions">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script
        src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script
        src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../templates/startbootstrap-sb-admin-2-1.0.8/dist/js/sb-admin-2.js"></script>
    <!--jQuery library-->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <?php
} else {
    ?>
<?php } ?>
<script type="text/javascript">
    $("#submit").click(function (e) {
		e.preventDefault();
        var category = $("#newscategory").val();
        if (category == "") {
            alert("Enter the News Category");
            return false;
        } else {
            //$("#newscategoryform").submit();
            $.ajax({
                url: 'functions/admin_functions.php',
                method: "POST",
                data: $("#newscategoryform").serialize(),
                success: function (response) {
                    //alert(response);
                    window.location.replace(response);
                }
            });
        }
    });
</script>
</body>
</html>
