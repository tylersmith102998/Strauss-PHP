<?php 

namespace Strauss\SQL;

use \PDO;

use \Strauss\Core\Config;
use \Strauss\Dev\Util\Logger\Logger;

class DB 
{

    private static $instance = null;

    public static function getInstance()
    {
        if (static::$instance == null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private $stmt;

    private $Logger;
    private $PDO;

    private function __construct()
    {
        $this->Logger = Logger::getLogger();
        $this->Logger->debug('Establishing database connection...');

        $host       = Config::get('DB.host');
        $username   = Config::get('DB.username');
        $password   = Config::get('DB.password');
        $db_name    = Config::get('DB.db');
        $charset    = Config::get('DB.charset');

        $dsn = "mysql:host={$host};dbname={$db_name};charset={$charset}";
        $options = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES      => false
        ];

        try 
        {
            $this->PDO = new PDO($dsn, $username, $password, $options);
        }
        catch (\PDOException $e)
        {
            $this->Logger->error($e->getMessage());
            die();
        }

        $this->Logger->info('Database connection established!');
        $this->Logger->debug("-- Connected to [{$host}:{$db_name}] as [{$username}]");
    }

    public function query(string $sql, array $data = [])
    {
        $this->Logger->debug("Preparing SQL query [{$sql}]");
        $this->Logger->debug("-- Data: " . json_encode($data));

        try 
        {
            $this->stmt = $this->PDO->prepare($sql);
            $this->stmt->execute($data);
        }
        catch (\PDOException $e)
        {
            $this->Logger->warn($e->getMessage());
            return false;
        }

        $this->Logger->info("Query [{$sql}] executed");
        return $this->stmt;
    }

    public function hasTable(string $name)
    {
        $sql = "SELECT 1 FROM `{$name}` LIMIT 1";
        return (bool) $this->query($sql);
    }

}