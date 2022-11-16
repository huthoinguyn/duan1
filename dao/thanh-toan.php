<?php
function hoa_don_insert($ma_kh, $dia_chi, $ho_ten, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh)
{
    $sql = "INSERT INTO hoa_don(ma_kh,ho_ten,dia_chi,so_dien_thoai,total,ghi_chu,trang_thai,ngay_tao,ngay_hoan_thanh) VALUES(?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ho_ten, $dia_chi, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh);
}
function hoa_don_chi_tiet_insert($don_gia, $so_luong, $ma_hd, $ma_hh)
{
    $sql = "INSERT INTO hoa_don_chi_tiet(don_gia,so_luong,ma_hd,ma_hh) VALUES(?,?,?,?)";
    pdo_execute($sql, $don_gia, $so_luong, $ma_hd, $ma_hh);
}
