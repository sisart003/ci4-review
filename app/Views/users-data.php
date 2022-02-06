<h3>Welcome to Users Data</h3>

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
    </thead>
    <tbody>
        <?php
        
            if(count($users) > 0){
                foreach($users as $index => $user){
        ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['age']; ?></td>
                <td><?= $user['email']; ?></td>
            </tr>

        <?php
                }
            }
        
        ?>
    </tbody>
</table>

<?= $pager->links(); ?>