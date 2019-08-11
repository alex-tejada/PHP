<?php

$imageBytes = @file_get_contents('php://input');
file_put_contents('screenshots/screenshot.png', base64_decode($imageBytes));

?>
