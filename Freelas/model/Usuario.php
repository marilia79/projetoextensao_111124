<?php

namespace Freelas\Model;

use Freelas\Lib\Conexao;

class Usuario
{
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;

    public function salvar(): bool
    {
        $conn = Conexao::getConnection();
        if (!isset($this->id)) {
            $stmt = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        } else {
            $stmt = $conn->prepare("UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        return $stmt->execute();
    }

    /**
     * Devolve um array de usuarios
     */
    public static function lista(): array
    {
        $conn = Conexao::getConnection();
        $stmt = $conn->query("SELECT * FROM usuario ORDER BY nome");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Freelas\Model\Usuario');   
        return (array) $stmt->fetchAll();
    }

    // Método para buscar um usuário pelo ID
    public static function buscarPorId(int $id): ?Usuario
    {
        $conn = Conexao::getConnection();
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Freelas\Model\Usuario');
        return $stmt->fetch();
    }

    // Método para excluir um usuário pelo ID
    public function deletar(): bool
    {
        $conn = Conexao::getConnection();
        if (!isset($this->id)) {
            return false;
        }
        $sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $this->id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

}
