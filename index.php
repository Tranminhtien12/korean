<?php
    include "Model/connect.php";
    include "Model/congthuc.php";
    include "Model/page.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- link b4 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <!-- link css -->
    <link rel="stylesheet" href="./Content/CSS/index.css" />
    <!-- link awsome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
    <style>

    </style>
<body>

    <!-- header -->
    <?php
       include "Views/header.php";
      ?>
    <!-- end header -->

    <!-- start content -->
    <?php
                $ctrl = "homeCtrl";
                if (isset($_GET['action'])) {
                    $ctrl = $_GET['action'];
                }
                include "Controller/".$ctrl.".php";
             ?>

    <!-- end content -->

    <!-- start footer -->
    <?php
      include 'Views/footer.php';
    ?>
    <!-- end footer -->

    <!-- start button backtop -->
    <div class="backtop" id="backtop">
        <i class="fa-solid fa-chevron-up"></i>
    </div>
    <!-- end button backtop -->

    <!-- start button addnew -->
    <div onclick="showop(this)" class="bt-new">
        <div class="addnew">
            <i class="fa-solid fa-plus"></i>
        </div>
        <ul>
            <li> <a href="index.php?action=homeCtrl&act=themcongthuc">Thêm công thức</a> </li>
            <li> <a href="index.php?action=homeCtrl&act=themtuvung">Thêm từ vựng</a> </li>
            <li> <a href="index.php?action=homeCtrl&act=themcongthuc">Thêm ghi chú</a> </li>
        </ul>
    </div>
    
    
    <!-- start button addnew -->
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- <script src="./Content/js/main.js"></script> -->
<script src="./Content/js/main.js"></script>

</html>