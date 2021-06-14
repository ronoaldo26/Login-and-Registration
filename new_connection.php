<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_DATABASE', 'account_database');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

if ($connection->connect_errno) 
{
    die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
}

function run_mysql_query($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);

    if(preg_match("/insert/i", $query))
    {
        mysqli_insert_id($connection);
    }
    elseif(preg_match("/select/i", $query))
    {
        $account_data = array();

        foreach($result as $data)
        {
            $account_data[] = $data;
        }

        return $account_data;
    }
}
?>