<?php
session_start();
include './function.php';
delete_user($_GET['id']);
