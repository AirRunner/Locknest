<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<?php echo $_SESSION['ID']; ?>