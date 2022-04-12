<?php
header("X_PHP_Response_Code: 404", true, 404);
echo <<<EOF
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p><hr><address>Apache/2.4.18 (Ubuntu) Server at localhost Port 8001</address></body></html>
EOF;
die();
?>