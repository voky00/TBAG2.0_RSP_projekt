<?php
$content = "";

function test() {
    echo "test1";
}


test();

require("backend.php");

$db->logAction("test", 1);