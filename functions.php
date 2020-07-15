<?php

function site_protect() {
    // Session starten (d.h. laden von Session-Variablen, sofern vorhanden):
    session_start();
    // bevor eine Ausgabe erfolgt, prüfe, ob User eingeloggt:
    // d.h. wenn "login" nicht gesetzt ODER wenn "login" nicht "ok" enthält,
    // dann ist user offenbar nicht eingeloggt...
    if (!isset($_SESSION["login"]) || $_SESSION["login"] !== "ok") {
      header("Location: login.php");
      exit;
    }
  }