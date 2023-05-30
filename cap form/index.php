<!DOCTYPE html>
<head>
<title>captcha form</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
     body {
        background-image: url("sky2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>
    <center>
    <div class="contact">
        <h3>contact form</h3>
        <form method="POST" action="">
        <input type="text" id="name" name="name" placeholder="Your Name" required><br>
        <input type="email" id="email" name="email"  placeholder="Your Email"required><br>
        <input type="tel" id="phone" name="phone"  placeholder="mobile number"required><br>
         <textarea id="message" name="message"  placeholder="Message" required ></textarea><br><br>
         <center>
            <div class="g-recaptcha" data-sitekey="6LdiyQYmAAAAAJAm15uJnoRqf9YkhgRLGBs_ZqSt"></div>
            <br/>
        </center>

          <input type="submit" value="Submit" name = "submit" class="btn-cls"><br><br>
        </form>
        <div class ="status">
        <?php
if (isset($_POST['submit'])) {
    $User_name = $_POST['name'];
    $phone = $_POST['phone'];
    $User_email = $_POST['email'];
    $User_message = $_POST['message'];

    $secreteKey = "6LdiyQYmAAAAADYVLniMHShx2uhLNTzg4gWlRHTu";
    $responseKey = $_POST['g-recaptcha-response'];
    $UserIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secreteKey&response=$responseKey&remoteip=$UserIP";

    $response = file_get_contents($url);
    $response = json_decode($response);

    if ($response->success) {
        echo "Form submitted successfully!";
    } else {
        echo "Invalid captcha, please try again";
    }
}
?>



        </div>
    </div>
</center>
</body>
</html>