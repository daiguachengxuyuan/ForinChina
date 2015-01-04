<?php
session_start();
require 'function_class/ValidateCode.class.php';
$_vc = new ValidateCode();
$_vc->doimg();
$_SESSION['authnum_session'] = $_vc->getCode();//save validationCode in SESSION

