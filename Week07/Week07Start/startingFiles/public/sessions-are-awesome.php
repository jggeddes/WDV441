<?php
session_start();


var_dump(session_id(), $_SESSION);

$_SESSION['cookie_yum_yum'] = 'chocolate chip';

?>