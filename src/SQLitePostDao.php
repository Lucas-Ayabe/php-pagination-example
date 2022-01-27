<?php

namespace Lucas\Playground;

use PDO;
use PDOStatement;

class SQLitePostDao
{
    public function __construct(private PDO $connection)
    {
    }

    private function query(string $query): PDOStatement
    {
        return $this->connection->query($query);
    }

    private function execute(string $query, array $params): PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function findByPage($page = 1, $limit = 20): array
    {
        return $this
            ->execute(
                "SELECT * FROM posts LIMIT ?, ?",
                [($page - 1) * $limit, $limit]
            )
            ->fetchAll(PDO::FETCH_FUNC, Post::create(...));
    }

    public function count(): int
    {
        return $this
            ->query("SELECT COUNT(*) as total FROM posts")
            ->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
