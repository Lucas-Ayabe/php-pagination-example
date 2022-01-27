<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Lucas\Playground\MySqlPostDao;

define("BASE_URL", "http://localhost:8080");

$page = filter_input(INPUT_GET, 'page');
$postsDao = new SQLitePostDao(new PDO("sqlite:../database/posts.db"));
$posts = $postsDao->findByPage($page);
$totalPosts = $postsDao->count();

require_once '../src/resources/pages/posts.php';
