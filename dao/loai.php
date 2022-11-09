<?php
// require_once 'pdo.php';

// loai insert
function loai_insert($ten_loai)
{
    $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
    pdo_execute($sql, $ten_loai);
}

// loai update
function loai_update($ma_loai, $ten_loai)
{
    $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
    pdo_execute($sql, $ten_loai, $ma_loai);
}

// loai delete
function loai_delete($ma_loai)
{
    $sql = "DELETE FROM loai WHERE ma_loai=?";
    if (is_array($ma_loai)) {
        foreach ($ma_loai as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_loai);
    }
}

// loai select all
function loai_select_all()
{
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}

// loai select by id
function loai_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM loai WHERE ma_loai=?";
    return pdo_query_one($sql, $ma_loai);
}

// loai exist
function loai_exist($ma_loai)
{
    $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
    return pdo_query_value($sql, $ma_loai) > 0;
}


