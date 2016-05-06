<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    error_reporting(0);
    include("../../functions/functions.php");
    include("../../config/config.php");
    include("functions/admin_functions.php");
    ?>
    <title><?php echo $site_name; ?></title>
    <link rel="shortcut icon" type="image/ico" href="../../images/favicon.ico"/>
    <link href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" type="text/css">
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
    <link rel='stylesheet' href='../../js/ctNotify/lib/jquery.ctNotify.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='../../js/ctNotify/lib/jquery.ctNotify.rounded.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='../../js/ctNotify/lib/jquery.ctNotify.roundedBr.css' type='text/css' media='all'/>

</head>
<body>
<?php
session_start();
if (isset($_SESSION['username'])) {
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include_once("admin_menu.php"); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tamil News Category</h2>
                <table class="table table-responsive table-bordered" id="newscategory">
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td>Actions</td>
                    </tr>
                    </tbody>
                    <?php
                    $resultNewsList = listNewsCategory();
                    if($resultNewsList){
                    foreach ($resultNewsList as $list) {
                        ?>
                        <tr>
                            <td><?php echo $list['name']; ?></td>
                            <td><a href="editNewsCategory.php"> <i class="fa fa-edit"></i></a>
                                <a href="editNewsCategory.php"> <i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    }
                    else{
                        ?>
                        <tr>
                            <td colspan="2" style="text-align:center;"><strong><?php echo "No Records Found"; ?></strong></td>
                        </tr>
                    <?php
                    }
                    }
                    ?>
                </table>
                <div class="message"></div>
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
<script type="text/javascript" src="../../js/ctNotify/lib/jquery.ctNotify.js"></script>
<script src="http:////cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>

<?php
if (isset($_GET['msg'])) {
    ?>
    <script type="text/javascript">
        $('#newscategory').DataTable();
        $.ctNotify('<?php echo $_GET['msg'];?>', {
            type: 'message',
            delay: 1000
        });
    </script>
    <?php
} else {
    header("location:../../index.php");
}
?>
</body>
</html>