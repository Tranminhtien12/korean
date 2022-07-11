<?php
        if (isset($_GET['act']))
        {
        if ($_GET['act'] == "themcongthuc")
        {
            $tag = 1;
        }else if ($_GET['act'] == "themcongthuc1") {
            $tag = 3;
        } 
        else if ($_GET['act'] == "themtuvung") {
            $tag = 2;
        }
        else if ($_GET['act'] == "themtuvung1") {
            $tag = 4;
        }
        }
?>
<?php if($tag == 1 || $tag == 3) { ?>

<div class="content">
    <div class="container">
        <div class="title">
            <img src="./Content/Image/kitty.png" alt="">
            <h2>Thêm công thức mới</h2>
            <img src="./Content/Image/kitty.png" alt="">
        </div>
        <hr>
        <form action="index.php?action=homeCtrl&act=themcongthuc1" method="post">
            <div class="input-box">
                <input required="required" type="text" name="tenct" id="">
                <span>Tên công thức</span>
            </div>
            <div class="input-box">
                <input required="required" type="text" name="congthuc" id=""><span> công thức</span>
            </div>

            <div class="input-box">
                <textarea required="required" name="mota" id="" cols="20" rows="5"></textarea><span> Mô tả</span>
                <input type="date" name="ngaydang" id="">
                <select style="width: 150px" name="maloai" id="">
                    <?php
                        $dt = new CongThuc();
                        $selectLoai=-1;
                        if(isset($maloai)&& $maloai!=-1)
                            {
                                $selectLoai=$maloai;
                            }
                        $result=$dt->getListLoaiCT();
                        while($set=$result->fetch()):
                        ?>
                    <option value="<?php echo $set['maloai'];?>" <?php if($selectLoai==$set['maloai']) 
                        echo 'selected="selected"';?>><?php echo $set['tenloai'];?></option>
                    <?php endwhile; ?>
                </select><br>
                <div class="themmoi">
                    <button type="submit"> Thêm mới</button>
                </div>
        </form>
    </div>
</div>

<?php } else { ?>
    <div class="content">
    <div class="container">
        <div class="title">
            <img src="./Content/Image/kitty.png" alt="">
            <h2>Thêm từ vựng  mới</h2>
            <img src="./Content/Image/kitty.png" alt="">
        </div>
        <hr>
        <form action="index.php?action=homeCtrl&act=themtuvung1" method="post">
            <div class="input-box">
                <input required="required" type="text" name="tiengbd" id="">
                <span>Tiếng bản địa</span>
            </div>
            <div class="input-box">
                <input required="required" type="text" name="tiengmd" id=""><span> Tiếng mẹ đẻ</span>
            </div>

            <div class="input-box">
                <textarea required="required" name="vidu" id="" cols="20" rows="5"></textarea><span>Ví dụ</span>
                <select style="width: 150px" name="maloai" id="">
                    <?php
                        $dt = new CongThuc();
                        $selectLoai=-1;
                        if(isset($maloai)&& $maloai!=-1)
                            {
                                $selectLoai=$maloai;
                            }
                        $result=$dt->getListLoaiTV();
                        while($set=$result->fetch()):
                        ?>
                    <option value="<?php echo $set['maloai'];?>" <?php if($selectLoai==$set['maloai']) 
                        echo 'selected="selected"';?>><?php echo $set['tenloai'];?></option>
                    <?php endwhile; ?>
                </select>

                <select style="width: 150px" name="mamon" id="">
                    <?php
                        $dt = new CongThuc();
                        $selectMon=-1;
                        if(isset($mamon)&& $mamon!=-1)
                            {
                                $selectMon=$mamon;
                            }
                        $result=$dt->getListMonTV();
                        while($set=$result->fetch()):
                        ?>
                    <option value="<?php echo $set['mamon'];?>" <?php if($selectMon==$set['mamon']) 
                        echo 'selected="selected"';?>><?php echo $set['tenmon'];?></option>
                    <?php endwhile; ?>
                </select><br>
                <div class="themmoi">
                    <button type="submit"> Thêm mới</button>
                </div>
        </form>
    </div>
</div>
<?php } ?>