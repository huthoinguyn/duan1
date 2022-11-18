<?php

// require_once 'pdo.php';

function thong_ke_hang_hoa()
{
    $sql = "SELECT count(*) FROM hang_hoa";
    $count = pdo_query_value($sql);
    return $count;
}

function thong_ke_binh_luan()
{
    $sql = "SELECT count(*) FROM binh_luan";
    $count = pdo_query_value($sql);
    return $count;
}

function thong_ke_khach_hang()
{
    $sql = "SELECT count(*) FROM khach_hang";
    $count = pdo_query_value($sql);
    return $count;
}
function thong_ke_loai()
{
    $sql = "SELECT count(*) FROM loai";
    $count = pdo_query_value($sql);
    return $count;
}
function thong_ke_don_hang()
{
    $sql = "SELECT count(*) FROM hoa_don";
    $count = pdo_query_value($sql);
    return $count;
}

function total_all()
{
    $total = thong_ke_loai() + thong_ke_khach_hang() + thong_ke_binh_luan() + thong_ke_hang_hoa();
    return $total;
}

function total_prod_of_cate($ma_loai)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_loai = ?";
    $count = pdo_query_value($sql, $ma_loai);
    return $count;
}

// function statistical()
// {
//     $prodArr = [];
//     $total_loai = thong_ke_loai();
//     for ($i = 0; $i < $total_loai; $i++) {
//         array_push($prodArr, total_prod_of_cate($i));
//     }
//     return $prodArr;
// }

function statistical()
{
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}

function priceCompare($ma_loai)
{
    $sql = "SELECT don_gia FROM hang_hoa WHERE ma_loai=? ORDER BY don_gia DESC";
    return pdo_query($sql, $ma_loai);
}
function priceMin($ma_loai)
{
    $sql = "SELECT don_gia FROM hang_hoa WHERE ma_loai=? ORDER BY don_gia ASC";
    return pdo_query($sql, $ma_loai);
}

function averagePrice($ma_loai)
{
    $avg = (priceCompare($ma_loai)[0][0] + priceMin($ma_loai)[0][0]) / 2;
    return $avg;
}
