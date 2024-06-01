<?php

require '../config/database.php';
session_destroy();
header('location: ../Login/dangnhap_form.php ');
