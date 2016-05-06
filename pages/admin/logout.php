<?php session_start(); ?>
    <!doctype html>
    <html>
    <body>
<?php
@session_start(); //to ensure you are using same session
include("../../functions/functions.php");
$logout=userLogout();
unset($_SESSION);
@session_destroy();
exit;
?>
    </body>
</html>
