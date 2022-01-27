<?php
// Imports
use Lucas\Playground\HTMLPostDecorator;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>

<body>
    <h1>Posts</h1>

    <div class="pagination">
        <?php foreach (range(1, $totalPosts / 20) as $page) : ?>
            <a href="<?= BASE_URL . "/?page=" . $page ?>"><?= $page ?></a>
        <?php endforeach; ?>
    </div>

    <?php foreach ($posts as $post) : ?>
        <?= new HTMLPostDecorator($post) ?>
    <?php endforeach; ?>
</body>

</html>