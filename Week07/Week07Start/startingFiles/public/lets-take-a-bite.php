<?php

// look at the cookies available
var_dump($_COOKIE);

//$_COOKIE[] = "test"; // wont work

// nono dont echo before setcookie
//echo "test";

setcookie('cookie_yum_yum', 'peanut-butter');
echo "test";
?>