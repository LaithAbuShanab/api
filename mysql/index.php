<?php include './header.php' ?>

<table class="table table-hover my-5 ">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Check Customer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (get_users() as $info) : ?>
            <tr>
                <td><?= $info['id'] ?></td>
                <td><?= $info['firstname'] ?></td>
                <td><?= $info['lastname'] ?></td>
                <td>
                    <a class="btn btn-success my-1" href="./customer.php?id=<?= $info['id'] ?>">Check</a>
                    <a class="btn btn-warning my-1" href="./edit.php?id=<?= $info['id'] ?>">Edit</a>
                    <a class="btn btn-danger my-1" href="./delete.php?id=<?= $info['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include './footer.php' ?>