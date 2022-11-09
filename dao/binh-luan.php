<?php

// require_once 'pdo.php';
function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_binh_luan)
{
    $sql = "INSERT INTO binh_luan(noi_dung,ma_kh,ma_hh,ngay_binh_luan) VALUES(?,?,?,?)";
    pdo_execute($sql, $noi_dung, $ma_kh, $ma_hh, $ngay_binh_luan);
}
function binh_luan_update($noi_dung, $ma_kh, $ma_hh, $ngay_binh_luan)
{
    $sql = "UPDATE binh_luan SET noi_dung=?,ma_kh=?,ma_hh=?,ngay_binh_luan=?, WHERE ma_bl=?";
    pdo_execute($sql,  $noi_dung, $ma_kh, $ma_hh, $ngay_binh_luan);
}
function binh_luan_delete($ma_bl)
{
    $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
    if (is_array($ma_bl)) {
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_bl);
    }
}
function binh_luan_select_all()
{
    $sql = "SELECT * FROM binh_luan";
    return pdo_query($sql);
}
function binh_luan_select_by_id($ma_bl)
{
    $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}
function binh_luan_exist($ma_bl)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}
function binh_luan_select_by_hang_hoa($ma_hh)
{
    $sql = "SELECT b.*, h.ten_hh FROM binh_luan b JOIN hang_hoa h ON h.ma_hh = b.ma_hh WHERE b.ma_hh = ? ORDER BY ngay_binh_luan DESC";
    return pdo_query($sql, $ma_hh);
}
