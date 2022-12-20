<?php

//logout user
session_start();
session_destroy();
header("Location: login/index.php");
exit;
