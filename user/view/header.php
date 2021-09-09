<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/style.css">
    <title>User || <?php echo $title; ?></title>
</head>
<body>
<header>
    <logo>
        <a href="/">User</a>
    </logo>
    <nav>
        <?php if($this->auth && $this->auth['id'] == 1):?>
            <a href="/user/users/">Users</a>
        <?php endif;?>
        <?php if($this->auth):?>
            <a href="/user/account/">Account</a>
            <a href="/user/profile/">Profile</a>
            <a class="danger" href="/user/logout/">Logout</a>
        <?php else: ?>
            <a href="/home/login/">Login</a>
            <a href="/home/register/">Register</a>
        <?php endIf ?>
    </nav>
</header>

