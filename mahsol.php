<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'kiako';
$id = $_GET['id'];
$connect = mysqli_connect($server, $user, $pass, $dbname);
$sql = 'select * from mahsolat where id=' . $id;
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mahsol</title>
    <style>
        .product-container {
            max-width: 100%;
            width: 90%;
            height: 90vh;
            max-height: max-content;
            display: flex;
            justify-content: space-between;
            align-items: center;
            s flex-wrap: wrap;
            padding: 2rem;
            margin: 2rem auto;
        }

        .product-image,
        .product-info {
            width: 45%;
            max-width: 100%;
            margin: 10px;
            text-align: right;
            border-radius: 10px;
            background: none;
            height: 70vh;
        }

        .product-image img {
            width: 100%;
            max-width: 100%;
            height: 60vh;
            object-fit: contain;
            border-radius: 20px;
        }

        .product-info .product-info-text h1 {
            margin-top: 10px;
            font-weight: bold;
            padding: 0.25rem;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 4vh;
        }

        .product-info .product-info-text p {
            margin-top: 10px;
            padding: 1.5rem;
            font-size: 1.25rem;
            border-top: 1px solid rgb(209, 211, 212, 0.3);
        }

        .product-info-price {
            margin-top: 10px;
            padding: 1.5rem;
            font-size: 1.25rem;
            border-top: 1px solid rgb(209, 211, 212, 0.3);
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70%;
        }

        .product-info-price .price {
            color: red;
            text-decoration: line-through;
            padding: 0.5rem;
            margin: 0.5rem;
            font-size: 1.25rem;
        }

        .product-info-price .off-price {
            color: green;
            padding: 0.5rem;
            margin: 0.5rem;
            font-size: 1.25rem;

        }

        .buy-button button {
            background-color: #76737e;
            padding: 1rem 1.25rem;
            border: none;
            border-radius: 10px;
            font-size: 1.5rem;
            font-weight: 400;
            width: 50%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .buy-button button:hover {
            opacity: 0.75;
        }
    </style>
</head>

<body class="body">
    <nav class="nav">
        <div id="nav" class="nav-section hide">
            <ul>
                <li><a href="index.html">صفحه اصلی</a></li>
                <li><a href="about-me.html">درباره من</a></li>
                <li><a href="call-me.html">ارتباط با من</a></li>
                <li><a href="mahsolat.php" class="here-page">فروشگاه</a></li>
                <li><a href="login.html">ثبت نام</a></li>
            </ul>
        </div>

        <div class="nav-section">
            <img src="images/png/withe.png" alt="kiako-logo" class="logo" />
        </div>
    </nav>

    <div class="nav-section dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">&#9776;</button>
        <div id="myDropdown" class="dropdown-content">
            <ul>
                <li class="mini-menu">منو</li>
                <li><a href="index.html">صفحه اصلی</a></li>
                <li><a href="about-me.html">درباره من</a></li>
                <li><a href="call-me.html">ارتباط با من</a></li>
                <li><a href="mahsolat.php" class="here-page">فروشگاه</a></li>
                <li><a href="login.html">ثبت نام</a></li>
            </ul>
        </div>
    </div>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['off'] == '') {
            echo '    
        <div class="product-container">
        <div class="product-image">
            <img src="./images/sib.webp" alt="Product Image">
        </div>
        <div class="product-info">
            <div class="product-info-text">
                <h1>' . $row['name'] . '</h1>
                <p>' . $row['tozih'] . '</p>
            </div>
            <div class="product-info-price">
                <p class="price">' . $row['price'] . '</p>
            </div>
            <div class="buy-button">
                <button>خرید</button>
            </div>
        </div>
    </div>
    ';
        } else {
            $price = $row['price'];
            $off = $row['off'];
            $off_price = $price - (($price * $off) / 100);
            echo '    
        <div class="product-container">
        <div class="product-image">
            <img src="./images/sib.webp" alt="Product Image">
        </div>
        <div class="product-info">
            <div class="product-info-text">
                <h1>' . $row['name'] . '</h1>
                <p>' . $row['tozih'] . '</p>
            </div>
            <div class="product-info-price">
                <p class="price">' . $row['price'] . '</p>
                <p class="off-price">' . $off_price . '</p>
            </div>
            <div class="buy-button">
                <button>خرید</button>
            </div>
        </div>
    </div>
    ';
        }
        ;
    }
    ;
    ?>
</body>

</html>