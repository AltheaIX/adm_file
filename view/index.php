<?php
include '../../config.php';

if(isset($_SESSION['email'])== 0) {
	header('Location: ../index.php');
} else {
    header('Location: ../admin');
}
