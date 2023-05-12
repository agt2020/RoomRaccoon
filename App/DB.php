<?php

class DB
{
    protected $db = null;
    protected static $dsn     = 'mysql:host=localhost;port=3306;dbname=roomraccon';
    protected static $driver  = 'mysql';
    protected static $host    = 'localhost';
    protected static $port    = 3306;
    protected static $dbName  = 'roomraccoon';
    protected static $user    = 'root';
    protected static $pass    = 'Agt@agT33';

    public function __construct(array $connectionOption)
    {
        static::$driver = (!isset($connectionOption['driver'])) ? static::$driver : $connectionOption['driver'];
        static::$host = (!isset($connectionOption['host'])) ? static::$host : $connectionOption['host'];
        static::$port = (!isset($connectionOption['port'])) ? static::$port : $connectionOption['port'];
        static::$dbName = (!isset($connectionOption['dbName'])) ? static::$dbName : $connectionOption['dbName'];
        static::$user = (!isset($connectionOption['user'])) ? static::$user : $connectionOption['user'];
        static::$pass = (!isset($connectionOption['pass'])) ? static::$pass : $connectionOption['pass'];
        static::$dsn = static::$driver . ':host=' . static::$host . ';port=' . static::$port . ';dbname=' . static::$dbName;
        $this->connect();
    }

    private function connect()
    {
        $this->db = new PDO(static::$dsn, static::$user, static::$pass);
    }

    public function prepare(string $sql)
    {
        return $this->db->prepare($sql);
    }

    public function execute(array $data)
    {
        return $this->db->execute($data);
    }

    public function __sleep()
    {
        return array('dsn', 'user', 'pass');
    }
    
    public function __wakeup()
    {
        $this->connect();
    }

}