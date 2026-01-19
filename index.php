<?php
$servername = "mysql-service";
$username = "root";
$password = getenv('MYSQL_ROOT_PASSWORD');
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

echo "<html><head><title>Brilliant App</title></head><body>";
echo "<h1>Witaj w Brilliant App!</h1>";
echo "<h2>Wersja: 2.0</h2>";
echo "<hr>";

if ($conn->connect_error) {
    http_response_code(500);
    echo "<p style='color:red; font-weight:bold'>BLAD: Brak polaczenia z baza danych!</p>";
    echo "<p>Error: " . $conn->connect_error . "</p>";
} else {
    echo "<p style='color:green; font-weight:bold'>SUKCES: Polaczenie z baza MySQL aktywne.</p>";
}
echo "</body></html>";
?>
