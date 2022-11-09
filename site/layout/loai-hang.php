<?php
function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query(
        $sql,
        '%' . $keyword . '%',
        '%' . $keyword . '%'
    );
}
?>
<div>DANH MỤC</div>
<div>
    <?php
    require '../../dao/loai.php';
    $loai_array = loai_select_all();
    foreach ($loai_array as $loai) {
        $href = "$SITE_URL/hang-hoa/liet-ke.php?ma_loai=$loai[ma_loai]";
        echo "<a href='$href'>$loai[ten_loai]</a>";
    }
    ?>
</div>
<div>
    <form action="<?= $SITE_URL ?>/hang-hoa/liet-ke.php">
        <input name="keywords" placeholder="Từ khóa tìm kiếm">
    </form>
</div>