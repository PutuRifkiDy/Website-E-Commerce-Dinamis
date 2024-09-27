<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css" />
    <title>Login - Page</title>
    <link rel="icon" href="img/logo_toko_kita-fotor-2024011719649-removebg(2).png">

</head>
<body>
    <div id="container" class="container">
        <div id="left" class="left">
            <div class="contain-left">
                <h1>Sign Up</h1>
                <p>Buat username dan password</p>
                <!-- <ul>
                    <li>Mainly talk programming, ui/ux, and networking</li>
                    <li>Analyzing with AI, with comprehensive algorithm</li>
                    <li>And many more !!!</li>
                </ul> -->
            </div>

            <form method="post" id="form" action="prosesSignUp.php">
                <div class="form-item">
                    <label for="name">
                        <p>Nama</p>
                    </label>
                    <input type="text" name="name" id="name" required>
                    <label for="email">
                        <p>Username</p>
                        <p id="invalid-email" class="invalid-email">Valid email required</p>
                    </label>
                    <input type="text" name="username" id="email" required>
                    <label for="password">
                        <p>Password</p>
                    </label>
                    <input type="password" name="password" id="email" required>
                </div>
                <div class="form-item">
                    <button id="submit-btn" type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>

        <div id="right" class="right">
            <img src="img/4957136_Mobile login.svg" alt="..." style="max-width: 768px;">
        </div>
        <!-- <div id="confirmed-message" class="confirmed-message">
            <img src="img/icons8-success.svg" alt="...">
            <h1>TecArt INSIDER</h1>
            <p>We are organization base on Udayana University. A confirmation email has been sent to <span id="user-email"></span>. Please open and confirm your subscription</p>
            <h2>THANKS FOR SUBSCRIBE!!!</h2>
            <button id="dismiss-message">Dismiss this message</button>
        </div> -->
    </div>   
       <!-- <script src="main.js"></script> -->
</body>
</html>