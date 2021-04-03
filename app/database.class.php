<?php
// The purpose of this class is to handle database operations.
// This includes establishing a connection and performing queries.

class Database
{
    private $_database_name = '';

    private $_database_host = '';

    private $_database_user = '';

    private $_database_password = '';

    protected $_connection = null;

    public function __construct(string $host, string $name, string $user, string $password)
    {
        try {
            $connection_details = [
                sprintf('mysql:dbname=%s;host=%s', $name, $host),
                $user,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            ];
            $this->_connection = new PDO(...$connection_details);

        return $this->_connection;
        } catch (PDOException $exception) {
            return 'There was an error connecting to the database: ' . $exception;
        }
    }

    public function getConnection()
    {
        return $this->_connection;
    }
}
