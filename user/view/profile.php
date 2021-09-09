<main>
    <form method="post" action="">
        <label for="firstName">First Name:</label>
        <input class="form-control" type="text" name="firstName" value="<?=$this->auth['firstName'] ?>">
        <br>
        <label for="middleName">middle Name:</label>
        <input class="form-control" type="text" name="middleName" value="<?=$this->auth['middleName'] ?>">
        <br>
        <label for="lastName">Last Name:</label>
        <input class="form-control" type="text" name="lastName" value="<?=$this->auth['lastName'] ?>">
        <br>
        <label for="email">Email:</label>
        <input class="form-control" name="email" value="<?=$this->auth['email'] ?>" type="email">
        <br>
        <label for="newPassword" >newPassword</label>
        <input class="form-control" name="newPassword" type="password">
        <br>
        <p>Enter New password if you want to change it.</p>
        <button class="btn btn-secondary" type="submit">Submit</button>
    </form>
</main>
