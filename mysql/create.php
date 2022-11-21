<?php include './header.php';
?>


<form class="w-50 m-auto border p-3" method="POST" action="./store.php">
    <?php if (isset($_SESSION) && !empty($_SESSION) && !empty($_SESSION['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
        </div>
    <?php
        unset($_SESSION['error']);
    endif ?>
    <div class="mb-3">
        <label for="first Name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first Name" aria-describedby="emailHelp" name="firstname" require>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="last name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last name" name="lastname" require>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" require>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" require>
    </div>
    <div class="mb-3">
        <label for="sales" class="form-label">Sales</label>
        <input type="number" class="form-control" id="sales" name="sales">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include './footer.php' ?>