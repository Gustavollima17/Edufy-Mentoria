<?php
class Database
{
    private $pdo;

    public function __construct($config)
    {
        $driver = $config['driver'];

        if ($driver === 'sqlite') {
            $this->pdo = new PDO("sqlite:" . $config['sqlite']['database']);
        } elseif ($driver === 'mysql') {
            $dsn = "mysql:host=" . $config['mysql']['host'] . 
                   ";dbname=" . $config['mysql']['database'] . 
                   ";charset=" . $config['mysql']['charset'];
            $this->pdo = new PDO($dsn, $config['mysql']['username'], $config['mysql']['password']);
        }

        // Configurações de erro
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
