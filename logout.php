<?php
// der Variable $_SESSION wird ein neues leeres Array zugewiesen []
// d.h. alle Session-Variablen/Werte sind damit gelöscht...
// alternative Schreibweise - macht das selbe: $_SESSION = array();
$_SESSION = [];

// Cookie löschen, um auf Nummer sicher zu gehen:
// recht komplex, da das Cookie gelöscht wird, indem man es mit den selben Optionen neu setzt mit Ablaufdatum in der Vergangenheit...
// (vorerst nicht so wichtig)...
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

header("Location: login.php");