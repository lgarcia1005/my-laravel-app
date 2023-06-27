<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
</head>
<body>

<?php foreach ($posts as $post) : ?>

<article>
    <h1>
        <a href="/posts/<?php echo $post->slug ?>">

                <?php echo $post->title ?>
        </a>
    </h1>
    <p><?php echo $post->excerpt ?></p>
</article>
<?php endforeach; ?>
</body>
</html>

