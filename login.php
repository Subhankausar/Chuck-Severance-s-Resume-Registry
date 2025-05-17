<?php
session_start();
require_once "pdo.php";

$salt = 'XyZzy12*_';

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    return;
}

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $check = hash('md5', $salt . $_POST['pass']);
    $stmt = $pdo->prepare('SELECT user_id, name FROM users WHERE email = :em AND password = :pw');
    $stmt->execute(array(':em' => $_POST['email'], ':pw' => $check));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row !== false) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: index.php");
        return;
    } else {
        $_SESSION['error'] = "Incorrect password";
        header("Location: login.php");
        return;
    <title>Subhan 020f5665</title>
    <?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
    <h1>Please Log In</h1>

    <!-- Required anchor tag for autograder -->
    <p><a href="login.php">Please log in</a></p>

    <?php
    if (isset($_SESSION['error'])) {
        echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="login.php">
        <label for="email">User Name</label>
        <input type="text" name="email" id="email"><br/>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"><br/>
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
    </form>

    <p>
        <!-- Hint: The password is the three character name of the programming language used in this class (all lower case) followed by 123 -->
    </p>
</body>
</html>
