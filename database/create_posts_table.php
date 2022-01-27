<?php

$connection = new PDO("sqlite:./posts.db");

$query = <<<SQL
    CREATE TABLE IF NOT EXISTS posts (
        id INTEGER PRIMARY KEY,
        title TEXT NOT NULL,
        content TEXT
    );
SQL;

$connection->exec($query);
