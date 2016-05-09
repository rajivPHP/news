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

    <!-- Bootstrap Core CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
if (isset ($_SESSION ['username'])) {
?>
<div id="wrapper">
<?php include_once("admin_menu.php"); ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
            <?php if(isset($_GET['msg'])){

            ?>
			<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $_GET['msg'];?><a href="dashboard.php" class="alert-link"></a></div>
			<?php
            header("location:dashboard.php");
            }?>
                <h4 class="page-header">News Category</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       News Category
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered" id="newscategory" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $resultNewsList = listNewsCategory();
                                if ($resultNewsList) {
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
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2" style="text-align: center;">
                                            <strong><?php echo "No Records Found"; ?></strong></td>
                                    </tr>
                                    <?php
                                }
                                }
                                else{
                                	header("location:../../index.php");
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../templates/startbootstrap-sb-admin-2-1.0.8/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Notification Plugin -->
<script type="text/javascript" src="../../js/ctNotify/lib/jquery.ctNotify.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../../templates/startbootstrap-sb-admin-2-1.0.8/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#newscategory').DataTable({
            responsive: true
        });
        $('.close').click(function () {
            window.location.replace("dashboard.php");
        })
    });
</script>

</body>

</html>
