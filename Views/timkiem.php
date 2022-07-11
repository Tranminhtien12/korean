<?php
        if (isset($_GET['act']))
        {
        if ($_GET['act'] == "toan")
        {
            $tag = 1;
        } else if ($_GET['act'] == "anhvan") {
            $tag = 2;
        } else if ($_GET['act'] == "vatly") {
            $tag = 3;
        } else if ($_GET['act'] == "hoa") {
            $tag = 4;
        } else if ($_GET['act'] == "nnhan") {
            $tag = 5;
        } else if ($_GET['act'] == "tvhan") {
            $tag = 6;
        } else if ($_GET['act'] == "tvanh") {
            $tag = 7;
        } else if ($_GET['act'] == "timkiem") {
            $tag = 8;
        } else if ($_GET['act'] == "favorite") {
            $tag = 9;
        } else {
            $tag = 0;
        }
        }
    ?>

<!-- lấy sản phẩm -->
<?php
    $product = new CongThuc();
    if ($tag !== 8) //$tag !== 6 && $tag !== 7 && $tag !== 9
    {
       
        if ($tag == 1)
        {
            $tenloai = $product->getListTenLoaiTV();
            $results = $product->getCTToan();
            $limit = 10; //Giới hạn số record của mỗi page
        } else if ($tag == 2) {
            $tenloai = $product->getListTenLoaiTV();
            $results = $product->getCTAnh();
            $limit = 10;//Giới hạn số record mỗi page
        } else if ($tag == 3) {
            $tenloai = $product->getListTenLoaiTV();
            $results = $product->getCTVat();
            $limit = 10;//Giới hạn số record mỗi page
        } else if ($tag == 4) {
            $tenloai = $product->getListTenLoaiTV();
            $results = $product->getCTHoa();
            $limit = 10;//Giới hạn số record mỗi page
        } else if ($tag == 5) {
            $tenloai = $product->getListTenLoaiTV();
            $results = $product->getCTHan();
            $limit = 10;//Giới hạn số record mỗi page
        } else if ($tag == 6) {
            $results = $product->getTVHan();
            $tenloai = $product->getListTenLoaiTV();
            $limit = 15;//Giới hạn số record mỗi page
        } else if ($tag == 7) {
            $results = $product->getTVAnh();
            $tenloai = $product->getListTenLoaiTV();
            $limit = 15;//Giới hạn số record mỗi page
        }
        //Tổng số records   
        $count = $results->rowCount();    
        //Tính số page
        $obj_page = new Page();
        $page = $obj_page->findPage($count,$limit);
        //Tính start
        $start = $obj_page->findStart($limit);
        //Trang hiện tại
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    }
  ?>
<!-- end lấy sản phẩm -->
<!-- start content -->
<div class="content-congthuc">
    <div class="container">
        <div class="title">
            <?php

                if ($tag == 1) {
                    echo "<h2>Toán  </h2>";
                } else if ($tag == 2) {
                    echo "<h2>Anh văn </h2>";
                } else if ($tag == 3) {
                    echo "<h2>Vật lý </h2>";
                } else if ($tag == 4) {
                    echo "<h2>Hóa </h2>";
                } else if ($tag == 5) {
                    echo "<h2>Ngôn ngữ hàn </h2>";
                } else if ($tag == 6) {
                    echo "<h2>Từ điển Hàn - Việt </h2>";
                } else if ($tag == 7) {
                    echo "<h2>Từ điển Anh - Việt </h2>";
                } else if ($tag == 8) {
                    echo "<h3 class='mb-5 font-weight-bold'>Kết quả tìm kiếm</h3>";
                } else if ($tag == 9) {
                    echo "<h3 class='mb-5 font-weight-bold'>MÓN ĂN ƯA THÍCH CỦA BẠN</h3>";
                    echo "(".$countFavoriteFood[0].")";
                } else {
                    echo "<h3 class='mb-5 font-weight-bold'>KHÔNG CÓ MÓN ĂN NÀO</h3>";
                }
            ?>

        </div>
        <hr>
        <?php
            $product = new CongThuc();

            if ($tag == 1)
            {
                $results = $product->getCTToanPage($start,$limit);
            } else if ($tag == 2) {
                $results = $product->getCTAnhPage($start,$limit);
            } else if ($tag == 3) {
                $results = $product->getCTVatPage($start,$limit);
            } else if ($tag == 4) {
                $results = $product->getCTHoaPage($start,$limit);
            } else if ($tag == 5) {
                $results = $product->getCTHanPage($start,$limit);
            } else if ($tag == 6) {
                $results = $product->getTVHanPage($start,$limit);
            } else if ($tag == 7) {
                $results = $product->getTVAnhPage($start,$limit);
            } else if ($tag == 8) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $name = $_POST['txtsearch'];
                    $results = $product->searchFood($name);
                }
            }

            while ($set = $results->fetch()): while ($set1 = $tenloai->fetch()):
                // $count = $user->countComment($set['mahh']);
        ?>
        <?php if($tag != 6 && $tag != 7) { ?>
        <ul>
            <li>
                <div class="title">
                    <p><span><?php echo $set['tenct'] ?>:</span> <?php echo $set['congthuc'] ?></p>
                </div>
                <div class="info">
                    <p><?php echo $set['ngaylap'] ?> <i class="fa-solid fa-calendar-days"></i></p>
                </div>
            </li>
            <li>
                <div class="des">
                    <textarea readonly rows="5"
                        style="width: 100%; height: 100%; border: none; background-color: transparent; outline: none;">
                        <?php echo $set['mota'] ?>
                        </textarea>
                </div>
            </li>
            <div class="action">
                <a href="index.php?action=homeCtrl&act=updatect&id=<?php echo $set['mact'];?>"><input type="button"
                        class="btn btn-primary" value="Sửa"></a>
                <a href="index.php?action=homeCtrl&act=delct&mact=<?php echo $set['mact'];?>"><input type="button"
                        class="btn btn-danger" value="Xóa"></a>
            </div>

        </ul>
        <?php } else { ?>
        <ul>
            <li>
                <div class="title">
                    <p><span><?php echo $set['tiengbd'] ?>:</span> <?php echo $set['tiengmd'] ?></p>
                </div>
                <div class="info">
                    <p><?php echo $set1['tenloai'] ?> <i class="fa-solid fa-calendar-days"></i></p>
                </div>
            </li>
            <li>
                <div class="des">
                    <textarea readonly rows="5"
                        style="width: 100%; height: 100%; border: none; background-color: transparent; outline: none;"><?php echo $set['vidu'] ?></textarea>
                </div>
            </li>

            <div class="action">
                <a href="index.php?action=homeCtrl&act=updatetv&id=<?php echo $set['matd'];?>"><input type="button"
                        class="btn btn-primary" value="Sửa"></a>
                <a href="index.php?action=homeCtrl&act=deltv&matd=<?php echo $set['matd'];?>"><input type="button"
                        class="btn btn-danger" value="Xóa"></a>
            </div>

        </ul>

        <?php } ?>

        <?php endwhile; ?>
        <?php endwhile; ?>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <ul class="pagination">
                <?php
                    $act_name = $_GET['act'];
                    if ($act_name != "timkiem") //&& $act_name != "hotfood" && $act_name != "muanhieu"
                    {
                        //Nút Prev
                        if ($current_page > 1 && $page > 1)
                        {
                            echo '<li><a href="index.php?action=homeCtrl&act='.$act_name.'&page='.($current_page-1).'">Prev</a></li>';
                        }
                        //Hiển thị các nút đánh số page
                        for ($i = 1; $i <= $page; $i++)
                        {
                    ?>
                <li><a
                        href="index.php?action=homeCtrl&act=<?php echo $act_name; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php
                        }
                        //Nút Next
                        if ($current_page < $page && $page > 1)
                        {
                            echo '<li><a href="index.php?action=homeCtrl&act='.$act_name.'&page='.($current_page+1).'">Next</a></li>';
                        }
                    }
                    
                    
                  ?>

            </ul>
        </div>
    </div>
</div>
<!-- end content -->