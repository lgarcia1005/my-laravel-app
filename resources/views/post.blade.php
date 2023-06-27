<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
</head>
<body>
<article>
    <h1>
        <?php echo $post->title ?>
    </h1>
    <p><?php echo $post->body ?></p>
</article>

    <a href="/">Back</a>

</body>
</html>
