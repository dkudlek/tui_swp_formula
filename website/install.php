<?php 

/* Diese Datei dient der Initialisierung des Systems von Seiten des
 * Webservers. Bitte l�schen Sie diese Datei im Anschluss an die erst-
 * malige Einrichtung des Webservers um ungewolltes Verhalten der Soft-
 * ware zu vermeiden.
 */

include 'config.php';

$connection = mysqli_connect("$dbhost", "$dbuname" , "$dbpass") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
$query_data = "CREATE TABLE data(value INT NOT NULL,identifier CHAR(32),timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
$query_user = "CREATE TABLE user(FirstName VARCHAR(30) NOT NULL,LastName VARCHAR(30) NOT NULL,Mail VARCHAR(40) NOT NULL,Password CHAR(128) NOT NULL,Identifier CHAR(32) NOT NULL,PRIMARY KEY (Mail))";

// �berpr�fen der Verbindung
if (mysqli_connect_errno())
{
	echo "MySQL-Verbindungsaufbau fehlgeschlagen: " . mysqli_connect_error();
}

// Datenbank erstellen
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($connection, $sql)) {
	echo "Die Datenbank \"vehicle_service_db\" wurde erfolgreich angelegt.<br>\n";
} else {
	echo "Es ist ein Fehler beim Erstellen der Datenbank aufgetreten: " . mysqli_error() . " <br>\n";
}

// Erstellen der Tabelle f�r die Benutzerdaten inkl. Informationen �ber Erfolg / Misserfolg
if (mysqli_query($connection, $query_data)) {
	echo "Die Tabelle \"data\" wurde erfolgreich erstellt.<br>\n";
} else {
	echo "Fehler beim Erstellen der Tabelle \"data\": " . mysqli_error() ." <br>\n";
}


// Erstellen der Tabelle f�r die Fahrzeugdaten inkl. Informationen �ber Erfolg / Misserfolg
if (mysqli_query($connection, $query_user)) {
	echo "Die Tabelle \"user\" wurde erfolgreich erstellt.<br>\n";
} else {
	echo "Fehler beim Erstellen der Tabelle \"user\": " . mysqli_error() ."<br>\n";
}

?>