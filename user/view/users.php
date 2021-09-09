<main>
    <table class="table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user) : ?>
            <tr>
                <td><?php echo $user['firstName'];?></td>
                <td><?php echo $user['middleName'];?></td>
                <td><?php echo $user['lastName'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><a href="/user/destroyUser/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete ' + '<?php echo $user['firstName'];?>' + '?')">Delete</a></td>
            </tr>
        <?php endForEach ?>
        </tbody>
    </table>
</main>
