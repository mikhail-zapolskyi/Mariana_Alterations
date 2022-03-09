<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('components/head.php'); ?>   
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>404 error page</title>
</head>
<body>
    <?php include ('components/menu.php'); ?>
    <div class="error">
        <div class="error__container">
            <p class="error__head">
                Sorry.
            </p>
            <p class="error__text">
                Looks like something went wrong on our end. <br>
                Please proceed to the Main Page
            </p>
            <div class="error__btn">
                <a href="index.php" class="error__link">go back</a>
            </div>
        </div>
    </div>
</body>
</html>