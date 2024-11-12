<?php
namespace Freelas\Lib;

use PDO;
use PDOException;
class Conexao
{

    private static ?PDO $connection = null;

    // Configurações do banco de dados
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'Freelas';
    private const DB_USER = 'root';
    private const DB_PASS = '';

    // Método para obter a conexão PDO
    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8';
                self::$connection = new PDO($dsn, self::DB_USER, self::DB_PASS);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
