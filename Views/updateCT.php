<?php
if(isset($_GET["act"]))
{
  if($_GET["act"]=="updatect")
  {
    $ac=1;
  }
  elseif($_GET["act"]=="updatetv")
  {
    $ac=2;
  }
  else
  {
    $ac=0;
  }
}
?>

<?php if($ac==1) { ?>
<div class="content">
    <div class="container">
        <div class="title">
            <img src="./Content/Image/kitty.png" alt="">
            <?php
                if($ac==1)
                {
                    echo '<h2>Chỉnh sửa công thức</h2>';
                }
                else if($ac==2)
                {
                echo 'THÔNG TIN LỖI';
                }
            ?>
            <img src="./Content/Image/kitty.png" alt="">
        </div>
        <hr>
        <?php
        if(isset($_GET['id']))
        {
        $mact=$_GET['id'];
        $dt=new CongThuc();
        $result=$dt->getListCongThucId($mact);
        $tenct=$result[1];
        $congthuc=$result[2];
        $maloai=$result[3];
        $ngaylap=$result[4];
        $mota=$result[5];
  }
  ?>
        <form action="index.php?action=homeCtrl&act=updatect1" method="post">
            <div class="input-box">
                <input readonly required="required" type="number" name="mact" id=""
                    value="<?php if(isset($mact)) echo $mact;?>">
            </div>
            <div class="input-box">
                <input required="required" type="text" name="tenct" id=""
                    value="<?php if(isset($tenct)) echo $tenct;?>">
                <span>Tên công thức</span>
            </div>
            <div class="input-box">
                <input required="required" type="text" name="congthuc" id=""
                    value="<?php if(isset($congthuc)) echo $congthuc;?>"><span> công thức</span>
            </div>

            <div class="input-box">
                <textarea required="required" name="mota" id="" cols="20"
                    rows="5"><?php if(isset($mota)) echo $mota;?></textarea><span> Mô tả</span>
                <input type="date" name="ngaydang" id="" value="<?php if(isset($ngaylap)) echo $ngaylap;?>">
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
                    <button type="submit"> Hoàn tất</button>
                </div>
        </form>
    </div>
</div>
<?php } else { ?>
    <div class="content">
    <div class="container">
        <div class="title">
            <img src="./Content/Image/kitty.png" alt="">
            <?php
                if($ac==2)
                {
                    echo '<h2>Chỉnh sửa từ vựng</h2>';
                }
                else
                {
                echo 'THÔNG TIN LỖI';
                }
            ?>
            <img src="./Content/Image/kitty.png" alt="">
        </div>
        <hr>
        <?php
        if(isset($_GET['id']))
        {
        $matd=$_GET['id'];
        $dt=new CongThuc();
        $result=$dt->getListTuVungId($matd);
        $tiengbd=$result[1];
        $tiengmd=$result[2];
        $maloai=$result[3];
        $mamon=$result[4];
        $vidu=$result[5];
  }
  ?>
        <form action="index.php?action=homeCtrl&act=updatetv1" method="post">
            <div class="input-box">
                <input readonly required="required" type="number" name="matd" id=""
                    value="<?php if(isset($matd)) echo $matd;?>">
            </div>
            <div class="input-box">
                <input required="required" type="text" name="tiengbd" id=""
                    value="<?php if(isset($tiengbd)) echo $tiengbd;?>">
                <span>Tiếng bản địa</span>
            </div>
            <div class="input-box">
                <input required="required" type="text" name="tiengmd" id=""
                    value="<?php if(isset($tiengmd)) echo $tiengmd;?>"><span> Tiếng mẹ đẻ</span>
            </div>

            <div class="input-box">
                <textarea required="required" name="vidu" id="" cols="20"
                    rows="5"><?php if(isset($vidu)) echo $vidu;?></textarea><span> Ví dụ</span>
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
                    <button type="submit"> Hoàn tất</button>
                </div>
        </form>
    </div>
</div>
<?php } ?>