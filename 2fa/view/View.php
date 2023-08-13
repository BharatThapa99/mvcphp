<?php
class LoginView {
    public function showLoginForm($error = '') {
        ?>
        <h2>Login</h2>
        <?php if ($error) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
        <?php
    }

    public function showNotification($msg='') {
        ?>
        <h3><?php $msg ?></h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Enter token:</label>
            <input type="text" name="token" required><br>


            <input type="submit" value="Login">
        </form>

        <?php
    }
}
?>
