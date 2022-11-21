<?php include './header.php';
$user = get_user($_GET['id']);

if (!$user)
    die('There Is No User')
?>
<h1 class="text-center my-5 text-success">LOADING ...</h1>
<p>
    <strong>ID:</strong>
    <?= $user['id'] ?>
</p>
<p>
    <strong>First Name:</strong>
    <?= $user['firstname'] ?>
</p>
<p>
    <strong>Last Name:</strong>
    <?= $user['lastname'] ?>
</p>
<p>
    <strong>Email:</strong>
    <?= $user['email'] ?>
</p>
<p>
    <strong>Phone:</strong>
    <?= $user['phone'] ?>
</p>
<p>
    <strong>sa:</strong>
    <?= $user['sales'] ?>
</p>
<p>
    <strong>Reg_Date:</strong>
    <?= $user['reg_date'] ?>
</p>
<p>
    <strong>Modify_On:</strong>
    <?= $user['modify_on'] ?>
</p>


<?php

header("Refresh: 5; URL=./index.php");


include './footer.php';
?>