<<?php
session_start();
echo "<p>You are logged in.";
echo "</p>";
echo "<p> Your Username is:";
echo htmlspecialchars($_SESSION['did']);
echo "</p>";
echo "<p> Your Password is:";
echo htmlspecialchars($_SESSION['dpwd']);
echo "</p>";
echo "<p> Your E-mail is:";
echo htmlspecialchars($_SESSION['demail']);
echo "</p>";
?>
