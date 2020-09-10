<!DOCTYPE html>

<html lang="vi">
    <head>
        <title>Helloiamadmin!</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <table id='banner'>
            <tr>
                <td>
                    <img style="margin-left: 20px" alt='Logo' src='logo.png' height='50px'>
                </td>
                <td id='thongtinlienhe'>
                    This is Admin's homepage
                </td>
                <td id='you'>
                    <?php if(isset($_SESSION['level'])){ ?>
                        <ul>
                            <li><?php echo ($_SESSION['name']) ?>
                                <ul>
                                    <li><a href="You.php?idAdmin=<?php echo ($_SESSION['idAdmin']) ?>">Thông tin cá nhân</a></li>
                                    <li><a href='logout.php'>Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </td>
            </tr>
        </table>