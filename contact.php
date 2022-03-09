<?php
    $name = $email = $phone_number = $message = '';
    $name_err = $email_err = $phone_err = $message_err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        if (isset($_POST['name']) && empty($_POST['name'])){
            $name_err = 'Name is required';
        } else {
            $name = test($_POST['name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                $name_err = 'Only letters and white space allowed';
            } 
        };

        if (isset($_POST['email']) && empty($_POST['email'])){
            $email_err = 'Email is required';
        } else {
            $email = filter_var(test($_POST['email']), FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_err = 'Invalid email format';
            } 
        };
        
        if (isset($_POST['phone_number']) && empty($_POST['phone_number'])){
            $phone_err = 'Phone number is required';
        } else {
            $phone_number = test($_POST['phone_number']);
            if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone_number)){
                $phone_err = 'Please enter correct number';
            } 
        }

        if (isset($_POST['message']) && empty($_POST['message'])) {
            $message_err = 'Message is required';
        } else {
            $message = test($_POST['message']);
        };
        
        if ($name_err == '' && $email_err == '' && $phone_err == '' && $message_err ==''){
            $to = 'eugenegaber@yahoo.ca';
            $subject = 'Request from: ' . test($_POST['name']);
            $body = '<h5> Name: '.$name. '</h5>';
            $body .= '<h5> Phone Number: '. test($_POST['phone_number']) . '</h5>';
            $body .= '<p>Message: '. $message. '</p>';
            
            $headers = 'From:' . test($_POST['email']) . "\r\n" .
            'Content-Type: text/html; charset=utf-8' . "\r\n";

            if(mail($to, $subject, $body, $headers)){
                $name = $email = $phone_number = $message = '';
                $name_err = $email_err = $phone_err = $message_err = '';
                header('Location: success.php');
            };
        };
        
    };

    function test($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('components/head.php'); ?>
    <meta name="title" content="Mariannas Altaretions | Contact | Calgary">
    <meta name="description" content="Please get in touch with me if you would 
    like to know more on how I can meet your alteration's needs!">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">
    <title>Mariannas Alterations - Contact</title>
</head>
<body>
    <?php include ('components/menu.php'); ?>
        <main class="contact">
            <section class="contact__header">
                <div class="contact__header-container">
                    <div class="contact__header-container-left">
                        <h1 class="contact__header--title">Please get in touch with me if you would like to know more on how
                        I can meet your alteration's needs! </h1>
                    </div>
                    <div class="contact__header-container-right">
                        <h2 class="contact__header--title">Feel free to give me a call for any urgent 
                        requests or inquiries.</h2>
                        <p class="contact__header--title-phone "><a href="tel:4032782655">403.278.2655</a></p>
                    </div>
                </div>
            </section>
            <section class="contact__form">
                <form action="" method="post" class="contact__form-container">
                    <div class="contact__form-container-left">
                        <div class="contact__form-text">
                            <input type="text" class="contact__form-input" 
                            id="fullName" placeholder="Enter Full Name" name="name"
                            value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>"
                            required minlength="3" pattern="[A-Za-z].{3,25}">
                            <label for="name" class="contact__form-lable">Full Name</label>
                            <label for="name" class="contact__alert"><?php echo $name_err ?></label>
                        </div>
                        <div class="contact__form-text">
                            <input type="text" class="contact__form-input" 
                            id="email" placeholder="Enter Email" name="email"
                            value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"
                            required minlength="3" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$">
                            <label for="email" class="contact__form-lable">Email</label>
                            <label for="email" class="contact__alert"><?php echo $email_err ?></label>
                        </div>
                        <div class="contact__form-text">
                            <input type="text" class="contact__form-input" 
                            id="phone" placeholder="Enter Phone Number" name="phone_number"
                            value="<?php echo isset($_POST["phone_number"]) ? $_POST["phone_number"] : ''; ?>"
                            required minlength="3" pattern="^[0-9]*$">
                            <label for="phone" class="contact__form-lable">Phone Number</label>
                            <label for="phone" class="contact__alert"><?php echo $phone_err ?></label>
                        </div>
                    </div>
                    <div class="contact__form-container-right">
                        <div class="contact__form-textarea">
                            <textarea name="message" id="textarea" class="contact__form-textarea-input" 
                            placeholder="Message" value="<?php echo isset($_POST["message"]) ? $_POST["message"] : ''; ?>"
                            pattern="[A-Za-z]{3}"></textarea>
                            <label for="textarea" class="contact__form-textarea-lable">Message</label>
                            <label for="textarea" class="contact__alert"><?php echo $message_err ?></label>
                        </div>
                        <div class="contact__form-btn">
                            <button type="submit" id="submit" name="submit" value="" class="contact__form-btn--submit">
                                <i class="contact__form-btn--icon icon-basic-paperplane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
        <div class="brake20vh"></div>
        <?php include ('components/footer.php'); ?>
</body>
</html>
