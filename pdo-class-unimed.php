<?php
/**
 * Classe de conexão ao banco de dados usando PDO
 * Modo de Usar:
 * $db = Database::conexao();
 * E agora use as funções do PDO (prepare, query, exec) em cima da variável $db.
 */
class Database
{
    # Variável que guarda a conexão PDO.
    protected static $db;

    # Private construct - garante que a classe só possa ser instanciada internamente.
    private function __construct()
    {
        # Informações sobre o banco de dados:
        $db_host = "127.0.0.1";
		$db_port = "3306";
        $db_nome = "unimed";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";

        try
        {
            # Atribui o objeto PDO à variável $db.
            # self:: é usado para métodos estáticos (equivalente ao $this)
            self::$db = new PDO("$db_driver:host=$db_host;port=$db_port;dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UTF-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e)
        {
            echo "<h1>Não consegui fazer a consulta</h1>";
        }
    }

    # Método estático - acessível sem instanciação.
    public static function conexao()
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new Database();
        }

        # Retorna a conexão.
        return self::$db;
    }

}