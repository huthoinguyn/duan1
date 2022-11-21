<?php
$ma_kh = $_SESSION['user']['ma_kh'];
$listBill = runSQL("SELECT * FROM hoa_don WHERE ma_kh= '" . $ma_kh . "'" . ' ORDER BY ma_hd DESC');
if ($listBill == null) {
    echo '
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <div class="mx-auto py-2 bg-danger text-white text-center">Bạn chưa có đơn hàng nào</div> 
        <a href="./trang-chu.php"><div class="mx-auto my-3 text-center"><button class="btn btn-primary"><i class="fas fa-arrow-left"></i> Tiếp tục mua sắm</button></div></a> ';
    die;
}
?>

<!-- CONTENT -->
<div class="container cart-content">

    <h4 class="my-4">Lịch sử mua hàng</h4>

    <?php foreach ($listBill as $bill) : ?>
        <div class="safe-area my-4">
            <div class="row">
                <h5>Chi tiết đơn hàng</h5>
                <br>
                <!-- info -->
                <div class="table-responsive-md col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <table class="table-order-detail" width="100%">

                        <tbody>
                            <tr>
                                <td>Mã đơn hàng:</td>
                                <td><?= $bill['ma_hd'] ?></td>
                            </tr>
                            <tr>
                                <td>Tên khách hàng:</td>
                                <td><?= $bill['ho_ten'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td><?= $bill['so_dien_thoai'] ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><?= $bill['dia_chi'] ?></td>
                            </tr>
                            <tr>
                                <td>Ghi chú:</td>
                                <td><?= $bill['ghi_chu'] ?></td>
                            </tr>
                            <tr>
                                <td>ngày đặt hàng:</td>
                                <td><?= $bill['ngay_tao'] ?></td>
                            </tr>
                            <tr>
                                <td>Tổng tiền:</td>
                                <td><?= $bill['total'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end info -->

                <!-- list-product -->
                <div class="list-product col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="table-responsive-md">
                        <table class="table table-centered" id="btn-editable">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $listSP = runSQL("SELECT hoa_don_chi_tiet.don_gia, hoa_don_chi_tiet.so_luong, hoa_don_chi_tiet.ma_hh, hang_hoa.ten_hh FROM hoa_don_chi_tiet JOIN hang_hoa on hoa_don_chi_tiet.ma_hh = hang_hoa.ma_hh WHERE ma_hd=" . $bill['ma_hd']);
                                foreach ($listSP as $x) : ?>
                                    <tr>
                                        <td><a style="text-decoration: none;" href="../product-detail.php?id=<?= $x["ma_hh"] ?>" target="_blank" rel="noopener noreferrer"><?= $x['ten_hh'] ?></a></td>
                                        <td><?= $x['so_luong'] ?></td>
                                        <td><?= $x['don_gia'] ?></td>
                                        <td><?= $x['don_gia'] * $x['so_luong'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end list product -->

                <div>
                    <div style="background-color: #bbc1cc;" class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        switch ($bill['trang_thai']) {
                            case '0':
                                echo '<span>Chưa xác nhận</span>';
                                break;
                            case '1':
                                echo '<span>Đang chuẩn bị hàng</span>';
                                break;
                            case '2':
                                echo '<span>Đang gửi hàng</span>';
                                break;
                            case '3':
                                echo '<span>Giao hàng thành công</span>';
                                break;
                            case '4':
                                echo '<span>Đã huỷ</span>';
                                break;
                        }
                        ?>
                    </div>
                </div>


            </div>

        </div>
    <?php endforeach ?>
</div>

</div><br><br><br>
<!-- END CONTENT -->