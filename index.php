<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
?>

<body>

    <div class="container my-3 ">
        <div class="row d-flex justify-content-center">

            <div class="container mb-5 d-flex justify-content-center">
                <div class="col-md-4">
                    <?php require_once "inc/success.php" ?>
                    <?php require_once "inc/errors.php" ?>
                    <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Add To Do</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="row d-flex justify-content-between">
            <!-- all -->
            <div class="col-md-3 ">
                <h4 class="text-white">All Notes</h4>


                <div class="m-2  py-3">
                    <div class="show-to-do">

                        <?php
                        $result = $conn->query("select * from todo where `status` = 'all' order by id desc");
                        if ($result->rowCount() > 0):
                            $data = $result->fetchAll(PDO::FETCH_ASSOC);
                            if (!empty($data)):
                                foreach ($data as $row): ?>
                                    <div class="alert alert-info p-2">
                                        <h4><?php echo $row["title"] ?></h4>
                                        <h5><?php echo $row["created_at"] ?></h5>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-info p-1 text-white">edit</a>

                                            <a href="handle/goto.php?title=doing&id=<?php echo $row["id"] ?>" class="btn btn-info p-1 text-white">doing</a>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="item">
                                    <div class="alert-info text-center ">
                                        empty to do
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="item">
                                <div class="alert-info text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">

                <h4 class="text-white">Doing</h4>


                <div class="m-2 py-3">
                    <div class="show-to-do">
                        <?php
                        $result = $conn->query("select * from todo where `status` = 'doing' ");
                        if ($result->rowCount() > 0):
                            $data = $result->fetchAll(PDO::FETCH_ASSOC);
                            if (!empty($data)):
                                foreach ($data as $row): ?>
                                    <div class="alert alert-warning p-2">
                                        <h4><?php echo $row["title"] ?></h4>
                                        <h5><?php echo $row["created_at"] ?></h5>
                                        <div class="d-flex justify-content-end mt-3">
                                            <a href="handle/goto.php?title=done&id=<?php echo $row["id"] ?>" class="btn btn-success p-1 text-white">done</a>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="item">
                                    <div class="alert-warning text-center ">
                                        empty to do
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="item">
                                <div class="alert-warning text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                        <?php
                        $result = $conn->query("select * from todo where `status` = 'done' ");
                        if ($result->rowCount() > 0):
                            $data = $result->fetchAll(PDO::FETCH_ASSOC);
                            if (!empty($data)):
                                foreach ($data as $row): ?>
                                    <div class="alert alert-success p-2">
                                        <h4><?php echo $row["title"] ?></h4>
                                        <h5><?php echo $row["created_at"] ?></h5>
                                        <div class="d-flex justify-content-end mt-3">
                                            <a href="handle/delete.php?id=<?php echo $row["id"] ?>"  onclick="return confirm('are you sure ? ')" class="btn btn-success p-1 text-white">end</a>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="item">
                                    <div class="alert-success text-center ">
                                        empty to do
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="item">
                                <div class="alert-info text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>