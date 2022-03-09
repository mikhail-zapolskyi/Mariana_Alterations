<?php
   require('config/db.php');

   // get ID
   $id = mysqli_real_escape_string($conn, $_GET['id']);

   // Create Query
   $query = 'SELECT * FROM posts WHERE id = '.$id;

   // Get Result
   $result = mysqli_query($conn, $query);

   // Fetch Data
   $post = mysqli_fetch_assoc($result);
   //var_dump($posts);

   // Free Result
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('components/head.php'); ?>
    <meta name="title" content="Mariannas Altaretions | <?php echo $post['title'];?> | Calgary">
    <meta name="description" content="<?php echo substr($post['body'], 0, 160) . ' ...'?>">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mariannas Alterations - <?php echo $post['title'];?></title>
</head>
<body>
    <header class="post__header">
        <?php include ('components/menu.php'); ?>
    </header>
    <main class="post">
        <section class="post__main">
            <div class="post__article">
                <img src="<?php echo $post['image']?>" alt="" class="post__article-image">
                <h2 class="post__article-header"><?php echo $post['title']?></h2>
                <p class="post__article-text"><?php echo $post['body'];?></p>
                <a href="<?php echo ROOT_URL;?>" class="post__article-link">check more articles &#x27A5;</a>
                <p class="post__article-date"><?php echo $post['created at']?></p>
            </div>
        </section>
    </main>
    <div class="brake20vh"></div>
    <?php include ('components/footer.php'); ?>
    
</body>
</html>