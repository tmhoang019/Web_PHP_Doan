<!DOCTYPE html>
<html>
    <head>
        <title>Chi tiết đơn hàng</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./resources/css/styles.css">
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            include 'connect-sql.php';
            $orders = mysqli_query($connect, "SELECT user.tenKH, hoadon.Diachi, hoadon.SDT, hoadon.Ghichu, chitiethoadon.*, sanpham.tensp 
FROM hoadon
INNER JOIN chitiethoadon ON hoadon.idHD = chitiethoadon.idHD
INNER JOIN user ON user.idKH = hoadon.idKH
INNER JOIN sanpham ON sanpham.idsanpham = chitiethoadon.idSP
WHERE hoadon.idHD = " . $_GET['id']);
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        }
        ?>
        <div id="order-detail-wrapper">
            <div id="order-detail">
                <h1>Chi tiết đơn hàng</h1>
                <label>Người nhận: </label><span> <?= $orders[0]['tenKH'] ?></span><br/>
                <label>Điện thoại: </label><span> <?= $orders[0]['SDT'] ?></span><br/>
                <label>Địa chỉ: </label><span> <?= $orders[0]['Diachi'] ?></span><br/>
                <hr/>
                <h3>Danh sách sản phẩm</h3>
                <ul>
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                    foreach ($orders as $row) {
                        ?>
                        <li>
                            <span class="item-name"><?= $row['tensp'] ?></span>
                            <span class="item-quantity"> - SL: <?= $row['Soluong'] ?> sản phẩm</span>
                        </li>
                        <?php
                        $totalMoney += ($row['Dongia'] * $row['Soluong']);
                        $totalQuantity += $row['Soluong'];
                    }
                    ?>
                </ul>
                <hr/>
                <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney, 0, ",", ".") ?> đ
                <p><label>Ghi chú: </label><?= $orders[0]['Ghichu'] ?></p>
            </div>
        </div>
    </body>
</html>