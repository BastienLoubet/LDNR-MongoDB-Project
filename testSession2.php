<?php
require_once('./php/basic_functions.php');
session_start();
make_html_start('Test');
//$_SESSION['connect']='admin';
bprint_r($_SESSION);
make_html_end();