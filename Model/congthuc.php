<?php
class CongThuc{
    var $mact=null;
    var $tenct=null;
    var $maloai=0;
    var $ngaylap=null;
    var $mota=null;
    public function __construct(){}
    // hiển thị thông tin sản phẩm:
    public function getListCongThuc()
    {
        // câu truy vấn:
        $select="select * from congthuc";
        $db=new connect();
        $result=$db->execP($select);
        $result->execute();
        return $result;
    }
    function getLoai()
    {
        $select ="select * from loai_congthuc";
        $dt=new connect();
        $result=$dt->getList($select);
        return $result;
    }
    // SELECT td.tiengbd,ltd.tenloai FROM tudien td INNER JOIN loai_tudien ltd ON td.maloai = ltd.maloai
    function getListLoaiCT()
    {
        $select ="select * from loai_congthuc";
        $dt=new connect();
        $result=$dt->getList($select);
        return $result;
    }
    function getListTenLoaiTV()
    {
        $select ="SELECT td.maloai,ltd.tenloai FROM tudien td INNER JOIN loai_tudien ltd ON td.maloai = ltd.maloai";
        $dt=new connect();
        $result=$dt->getList($select);
        return $result;
    }
    function getListLoaiTV()
    {
        $select ="select * from loai_tudien";
        $dt=new connect();
        $result=$dt->getList($select);
        return $result;
    }
    function getListMonTV()
    {
        $select ="select * from nn_tudien";
        $dt=new connect();
        $result=$dt->getList($select);
        return $result;
    }
    public function insertProduct($tenct,$congthuc,$maloai,$ngaylap,$mota)
    {
        $db = new connect();
        $query = "INSERT INTO congthuc(mact,tenct,congthuc,maloai,ngaylap,mota) 
        VALUES ( NULL, '$tenct','$congthuc',$maloai,'$ngaylap','$mota')";
        $tmp = $db -> exec($query);
    }
    public function insertTV($tiengbd,$tiengmd,$maloai,$mamon,$vidu)
    {
        $db = new connect();
        $query = "INSERT INTO tudien(matd,tiengbd,tiengmd,maloai,mamon,vidu) 
        VALUES ( NULL, '$tiengbd','$tiengmd',$maloai,'$mamon','$vidu')";
        $tmp = $db -> exec($query);
    }
    // lấy công thức theo môn học
    public function getCTToan()
    {
        $select = "SELECT * FROM congthuc WHERE maloai=2";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTToanPage($start, $limit)
    {
        $select = "SELECT * FROM congthuc WHERE maloai=2 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTAnh()
    {
        $select = "SELECT * FROM congthuc WHERE maloai=1";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTAnhPage($start, $limit)
    {
        $select = "SELECT * FROM congthuc WHERE maloai=1 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTHoa()
    {
        $select = "SELECT * FROM congthuc WHERE maloai=3";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTHoaPage($start, $limit)
    {
        $select = "SELECT * FROM congthuc WHERE maloai=3 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTVat()
    {
        $select = "SELECT * FROM congthuc WHERE maloai=4";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTVatPage($start, $limit)
    {
        $select = "SELECT * FROM congthuc WHERE maloai=4 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTHan()
    {
        $select = "SELECT * FROM congthuc WHERE maloai=5";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getCTHanPage($start, $limit)
    {
        $select = "SELECT * FROM congthuc WHERE maloai=5 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    function getListCongThucId($mact)
    {
        $select ="select * from congthuc where mact=$mact";
        $dt=new connect();
        $result=$dt->getInstance($select);
        return $result;
    }
    function getListTuVungId($matd)
    {
        $select ="select * from tudien where matd=$matd";
        $dt=new connect();
        $result=$dt->getInstance($select);
        return $result;
    }
    public function getfixCongThuc($id,$tenct,$congthuc,$maloai,$ngaylap,$mota) 
    {
        $db = new connect();
        $query = "UPDATE congthuc SET tenct = '$tenct',congthuc = '$congthuc',
        maloai = $maloai,
        ngaylap='$ngaylap',
        mota='$mota'  WHERE mact = $id";
        $tmp = $db -> exec($query);
    }
    public function delProduct($mact)
    {
        $db = new connect();
        $query = "delete from congthuc where mact= $mact";
        $tmp = $db -> exec($query);
    }

    public function getfixTuVung($id,$tiengbd,$tiengmd,$maloai,$mamon,$vidu) 
    {
        $db = new connect();
        $query = "UPDATE tudien SET tiengbd = '$tiengbd',tiengmd = '$tiengmd',
        maloai = $maloai,
        mamon='$mamon',
        vidu='$vidu'  WHERE matd = $id";
        $tmp = $db -> exec($query);
    }
    public function delTV($matd)
    {
        $db = new connect();
        $query = "delete from tudien where matd= $matd";
        $tmp = $db -> exec($query);
    }
    // lấy từ vựng theo ngôn ngữ
    public function getTVHan()
    {
        $select = "SELECT * FROM tudien WHERE mamon=2";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getTVHanPage($start, $limit)
    {
        $select = "SELECT * FROM tudien WHERE mamon=2 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function getTVAnh()
    {
        $select = "SELECT * FROM tudien WHERE mamon=1";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }

    public function getTVAnhPage($start, $limit)
    {
        $select = "SELECT * FROM tudien WHERE mamon=1 LIMIT ".$start.",".$limit;
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    // tìm kiếm từ vựng
    public function searchTV($search)
    {
        $db = new connect();
        $select = "SELECT * FROM tudien WHERE tiengbd LIKE :tiengbd OR tiengmd LIKE :tiengmd";
        $stm = $db->getListPrepare($select);
        $stm->bindValue(':tiengbd', "%".$search."%");
        $stm->bindValue(':tiengmd', "%".$search."%");
        $stm->execute();
        return $stm;
    }
    //Tìm kiếm món ăn
    public function searchFood($search)
    {
        $db = new connect();
        if (is_numeric($search)) {
            $select = "SELECT * FROM product WHERE dongia=:dongia OR giamgia=:giamgia";
            $stm = $db->getListPrepare($select);
            $stm->bindParam(':dongia', $search);
            $stm->bindParam(':giamgia', $search);
        } else {
            $select = "SELECT * FROM product WHERE tenhh like :tenhh";
            $stm = $db->getListPrepare($select);
            $stm->bindValue(':tenhh', "%".$search."%");
        }
        $stm->execute();
        return $stm;       
    }
    // function getLoai()
    // {
    //     $select ="select * from type_product";
    //     $dt=new connect();
    //     $result=$dt->getList($select);
    //     return $result;
    // }
    // function getListHangHoaId($mahh)
    // {
    //     $select ="select * from product where mahh=$mahh";
    //     $dt=new connect();
    //     $result=$dt->getInstance($select);
    //     return $result;
    // }
    // function getListLoaiHH()
    // {
    //     $select ="select * from type_product";
    //     $dt=new connect();
    //     $result=$dt->getList($select);
    //     return $result;
    // }
    // public function getfixHanghoa($id,$tenhh,$dongia
    // ,$giamgia,$hinh,$maloai,$ngaylap,$mota,
    // $soluongton,$soluotxem) 
    // {
    //     $db = new connect();
    //     $query = "UPDATE product SET tenhh = '$tenhh',dongia = $dongia,giamgia = $giamgia,
    //     hinh='$hinh',
    //     maloai = $maloai,
    //     ngaylap='$ngaylap',
    //     mota='$mota',soluongton =$soluongton, soluotxem = $soluotxem  WHERE mahh = $id";
    //     $tmp = $db -> exec($query);
    // }
    // public function delProduct($mahh)
    // {
    //     $db = new connect();
    //     $query = "delete from product where mahh= $mahh";
    //     $tmp = $db -> exec($query);
    // }

    // public function insertProduct($tenhh,$dongia,$giamgia,$hinh,
    // $maloai,$ngaylap,$mota,$slt,$soluotxem)
    // {
    //     $db = new connect();
    //     $query = "INSERT INTO product(mahh,tenhh,dongia,giamgia,hinh,maloai,ngaylap,mota,soluongton,soluotxem) 
    //     VALUES ( NULL, '$tenhh', $dongia,$giamgia,'$hinh',$maloai,'$ngaylap','$mota', $slt, $soluotxem)";
    //     $tmp = $db -> exec($query);
    // }

    // function getListThongKe_SL_hh()
    // {
    //     $select="select a.tenhh,sum(soluongmua) soluongban from product a,cthoadon1 b where a.mahh=b.mahh group by a.tenhh";
    //     $db=new connect();
    //     $result=$db->getList($select);
    //     return $result;
    // }
}