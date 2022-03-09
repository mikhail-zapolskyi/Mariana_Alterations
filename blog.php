<?php
    require('config/db.php');
    $db = 'SELECT * FROM posts';
    $result = mysqli_query($conn, $db);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('components/head.php'); ?>
    <meta name="title" content="Mariannas Altaretions | Blog | Calgary">
    <meta name="description" content="New things at Marianna's Alterations - 
things I find interesting. Hope you too!">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mariannas Alterations - Blog</title>
</head>
<body>
    <header class="header__secondary">
        <?php include ('components/menu.php'); ?>
        <div class="services__header">
            <div class="services__header-sircles">
                <div class="services__header-sircles-left"></div>
                <div class="services__header-sircles-right"></div>
            </div>
            <div class="services__header-text">
                <div class="services__header--hero-box">
                    <div class="services__header--hero">
                        <h1 class="services__header--hero-txt services__header--hero-txt-left">New things</h1>
                        <p class="services__header--hero-par services__header--hero-par-right">
                        Things I find interesting</p>
                        <p class="services__header--hero-par services__header--hero-par-left">
                        hope you too</p>
                        <h2 class="services__header--hero-txt services__header--hero-txt-right">at marianna's alterations</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="blog">
        <section class="blog__main">
            <?php foreach($posts as $post) : ?>
            <div class="blog__articles">
                <img src="<?php echo $post['image']?>" alt="<?php echo $post['title']?>" class="blog__articles-image">
                <h2 class="blog__articles-header"><?php echo $post['title']?></h2>
                <p class="blog__articles-text"><?php echo substr($post['body'], 0, 300) . ' ...'?></p>
                <a href="post.php?id=<?php echo $post['id'];?>" class="blog__articles-link">Read full article</a>
                <p class="blog__articles-date"><?php echo $post['created at']?></p>
            </div>
            <?php endforeach;?>
        </section>
    </main>
    <div class="brake20vh"></div>
    <?php include ('components/footer.php'); ?>
</body>
</html>