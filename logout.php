<?php
session_reset();
session_destroy();
header("Location: index.html");
exit;
?>