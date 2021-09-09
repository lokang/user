<main>
    <?php echo $this->errors() ?>
    <form action="" method="post">
        <p>
            <label for="email">Email:</label>
            <input name="email" type="email">
        </p>
        <p>
            <label for="password">Password:</label>
            <input name="password" type="password">
        </p>
        <p>
            <button type="submit">Login</button> <a href="/home/passwordRecovery/">Forgot Password?</a>
        </p>
    </form>
</main>
