<?php

require '../../global.php';
require '../../pdo.php';
require '../../dao/thanh-toan.php';
require '../../dao/hang-hoa.php';

extract($_REQUEST);

$VIEW_NAME = "don-hang/list.php";
require '../layout.php';
