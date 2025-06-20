<?php
// vulnerable.php para SAST con Semgrep
$name = $_GET['name'];
echo "Hola " . $name; // XSS reflejado
