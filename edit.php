<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once "classes/Request.php";
?>

<body class="container w-50 mt-5">
    <?php
    $id = $Request->get("id");
    $stm = $conn->query("select title from todo where id =$id");
    if ($stm->rowCount() == 1) {
        $row = $stm->fetchColumn();
    } else {
        $Request->home();
    }
    ?>
    <?php require_once "inc/success.php" ?>
    <?php require_once "inc/errors.php" ?>
    <form action="handle/edit.php?id= <?php echo $id ?>" method="post">
        <textarea type="text" class="form-control" name="title" id="" placeholder="enter your note here"><?php echo $row ?></textarea>
        <div class="text-center">
            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Update</button>
        </div>
    </form>
</body>

</html>