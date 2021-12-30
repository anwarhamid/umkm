<?php
session_start(); // Start session nya
session_destroy(); // Hapus semua session
header("location: login.php"); // Redirect ke halaman login.php