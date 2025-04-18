<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="assets/js/validate.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <?php include("./includes/header.php"); ?>
    </header>
    <main>
        <div class="loginruimte">
            <form method="post" action="./dbcalls/checklogin.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </main>
    <footer>
        <?php include("./includes/footer.php"); ?>
    </footer>
</body>

</html>