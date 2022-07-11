<?php
class Page {
    //Tính số trang
    public function findPage($count,$limit)
    {
        //Tính tổng số page
        $page = ceil($count/$limit);
        return $page;
    }
    //Tính start
    public function findStart($limit)
    {
        if (!isset($_GET['page']) || $_GET['page'] == 1)
        {
            $start = 0;
            $_GET['page'] = 1;
        } else {
            $start = ($_GET['page'] - 1)*$limit;
        }
        return $start;
    }
}
?>