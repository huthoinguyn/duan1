<?php

// Mở kết nối 
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = 'root';
    $password = '';
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

// Thực thi câu lệnh INSERT, UPDATE, DELETE
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn nhiều bản ghi
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn 1 bản ghi
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn 1 giá trị
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


// => Thêm mới loại $sql = "INSERT INTO loai
// (ten_loai) VALUES(?)";
// pdo_execute($sql, $ten_loai);
// => Cập nhật loại $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
// pdo_execute($sql, $ten_loai, $ma_loai);
// => Xóa loại $sql = "DELETE FROM loai WHERE ma_loai=?";
// pdo_execute($sql, $ma_loai);
// => Truy vấn tất cả các loại $sql = "SELECT * FROM loai";
// $rows = pdo_query($sql);
// => Truy vấn 1 loại $sql = "SELECT * FROM loai WHERE ma_loai=?";
// $row = pdo_query_one($sql, $ma_loai);
// => Đếm số loại 