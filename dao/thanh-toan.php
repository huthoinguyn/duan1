<?php
function hoa_don_insert($ma_kh, $dia_chi, $ho_ten, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh)
{
    $sql = "INSERT INTO hoa_don(ma_kh,ho_ten,dia_chi,so_dien_thoai,total,ghi_chu,trang_thai,ngay_tao,ngay_hoan_thanh) VALUES(?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ho_ten, $dia_chi, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh);
    return true;
}
function hoa_don_chi_tiet_insert($don_gia, $so_luong, $ma_hd, $ma_hh)
{
    $sql = "INSERT INTO hoa_don_chi_tiet(don_gia,so_luong,ma_hd,ma_hh) VALUES(?,?,?,?)";
    pdo_execute($sql, $don_gia, $so_luong, $ma_hd, $ma_hh);
    return true;
}

function hoa_don_select_by_id($ma_kh)
{
    $sql = "SELECT * FROM hoa_don WHERE ma_kh =?";
    return pdo_query_one($sql, $ma_kh);
}
function hoa_don_chi_tiet_select_by_id($ma_hdct)
{
    $sql = "SELECT * FROM hoa_don_chi_tiet WHERE ma_hdct =?";
    return pdo_query_one($sql, $ma_hdct);
}

function hoa_don_select_all()
{
    $sql = "SELECT * FROM hoa_don";
    return pdo_query($sql);
}

function hoadonchitiet_select($ma_hd)
{
    $sql = "SELECT * FROM hoa_don_chi_tiet WHERE ma_hd =?";
    return pdo_query_one($sql, $ma_hd);
}
