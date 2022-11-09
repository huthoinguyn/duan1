<?php

require '../../global.php';
require '../../pdo.php';
require '../../dao/binh-luan.php';
require '../../dao/hang-hoa.php';

extract($_REQUEST);

$VIEW_NAME = "binh-luan/binh-luan.php";
require '../layout.php';
