<?php


require ('des/head.php')

    ?>

<body>
    <style>
        body {
            font-family: 'Noto Kufi Arabic', sans-serif;
            background-image: url("pics/13.png");
            background-size: cover;
            background-attachment: fixed;

            .josefin-sans-<uniquifier> {
                font-family: "Josefin Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: <weight>;
                font-style: normal;
            }

        }
    </style>

    <?php
    require ('des/navbar.php');
    ?>



    <div class="container">

        <div class="col-sm-10"
            style="width: 35rem; hight: 30rem;  margin-top: 350px;  margin-left: 800px; color:white;">



            <div class="text-center  fs-1">
                نظم عملك عن طريق <span class="text-warning">مهامي</span>

            </div>

            <div class="text-right">
                <p></p>

                <div class="text-center">
                    <button class="btn btn-dark" style="background-color: #FFE500; color: black;"
                        onclick="window.location.href = 'todo.php';">my workspace</button>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>