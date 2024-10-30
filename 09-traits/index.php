<pre>
<?php

// Define the LoggerTrait
trait LoggerTrait
{
    // Method to log messages
    public function log($message)
    {
        echo "[LOG] " . $message . "\n";
    }
}

// Implementing the FileLogger class
class FileLogger
{
    use LoggerTrait; // Include the LoggerTrait

    private $filePath;

    // Constructor to set the file path for logging
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    // Method to write a log message to a file
    public function writeLog($message)
    {
        // Simulating file logging
        $this->log($message); // Call the log method from the trait
        // In a real application, you'd write the message to a file here
        echo "Writing to file: {$this->filePath}\n";
    }
}

// Implementing the DatabaseLogger class
class DatabaseLogger
{
    use LoggerTrait; // Include the LoggerTrait

    private $connection;

    // Constructor to set the database connection (simulated)
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // Method to write a log message to the database
    public function writeLog($message)
    {
        $this->log($message); // Call the log method from the trait
        // In a real application, you'd insert the message into a database here
        echo "Inserting log into database with connection: {$this->connection}\n";
    }
}

// Create logger objects
$fileLogger = new FileLogger("/path/to/logfile.txt");
$databaseLogger = new DatabaseLogger("db_connection_string");

// Write logs
echo "File Logger:\n";
$fileLogger->writeLog("File logger initialized.");
echo "<br>";

echo "Database Logger:\n";
$databaseLogger->writeLog("Database logger initialized.");
