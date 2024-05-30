<?php

require ('handler.php');

require ('des/head.php')
    ?>

<body style="background: black">

    <style>
        body {
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
    </style>

    <?php
    require ('des/navbar.php');
    ?>


    <div class="w-auto mt-10  mb-4" style="background: black">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <div class="card  mt-5 mb-5 p-2 " style="border-radius: 20px;   ">
                        <div class="card-body p-3">

                            <h2 class="mb-3 text-center">نظم عملك</h2>
                            <!--#####################################################              THE  FORM          ####################################################--->
                            <form class="d-flex justify-content-center align-items-center mb-4" action="todo.php"
                                method="POST">
                                <div class="form-outline flex-fill">
                                <input type="text" id="form3" class="form-control form-control-lg" name="task" value="<?php echo htmlspecialchars($_POST['task'] ?? ''); ?>">

                                    <label class="form-label" for="form3">ما هي المهمة التي تريد اضافتها ؟</label>
                                    <?php
                                    
                                    
                                    ?>





                                </div>
                                <button type="submit" class="btn btn-primary btn-lg ms-2" name="add">Add</button>
                            </form>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>created at</th>
                                        <th>Task</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['created_at'] . "</td>";
                                        echo "<td>" . htmlspecialchars($row['task']) . "</td>";
                                        echo "<td>
                                        <form action='todo.php' method='POST'>
                                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                                            <button type='submit' class='btn btn-danger btn-sm' name='delete'>Delete</button>
                                        </form>
                                      </td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the connection

?>