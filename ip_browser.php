
<?php
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = get_browser(null, true);
print_r($browser);
$ip_do_usuario = $_SERVER['REMOTE_ADDR'];
echo $ip_do_usuario;
?>
