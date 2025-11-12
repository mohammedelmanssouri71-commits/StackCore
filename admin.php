<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            /* flex-direction: row; */
        }

        nav {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: #333;
            color: #fff;
            padding: 10px;
            width: 200px;
            /* height: 100vh; */
            gap: 10px;
            box-shadow: 2px 0 5px 2px rgba(0, 0, 0, 0.5);
            z-index: 10;
            overflow-y: auto;
            overflow-x: hidden;
            -ms-overflow-style: none;
            /* IE et Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        nav::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari et Opera */
        }

        nav h1 {
            padding: 10px;
            cursor: pointer;
        }

        nav>div>div {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
            padding: 10px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: nowrap;
            width: 100%;
        }

        nav>div>div:hover {
            cursor: pointer;
            background-color: #666;
        }

        nav>div {
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: space-between;
            align-items: flex-start;
        }

        nav div i {
            color: white !important;
        }

        nav div.active i {
            color: blue !important;
        }

        .fa-sign-out-alt {
            color: red !important;
        }

        main {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100vh;
            padding: 15px;
            overflow-y: auto;
            overflow-x: hidden;
            -ms-overflow-style: none;
            /* IE et Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        main::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari et Opera */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            color: #333;
            z-index: 1;
        }

        .header div {
            display: flex;
            gap: 20px;
        }

        .header div i {
            color: #333;
            font-size: 20px;
        }

        .header div i:hover {
            color: #666;
            cursor: pointer;
        }

        #content {
            margin-top: 20px;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE et Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        #content::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari et Opera */
        }
    </style>
</head>

<body>
    <nav>
        <div>
            <h1>StackCore</h1>
        </div>
        <div>
            <div onclick="loadContent(this,'dashboard.php')" class="active"><i class="fas fa-home"></i> Dashboard</div>
            <div onclick="loadContent(this,'products.php')"><i class="fas fa-box"></i> Products</div>
            <div onclick="loadContent(this,'categories.php')"><i class="fas fa-list"></i> Categories</div>
            <div onclick="loadContent(this,'promotions.php')"><i class="fas fa-tag"></i> Promotions</div>
            <div onclick="loadContent(this,'customers.php')"><i class="fas fa-users"></i> Customers</div>
            <div onclick="loadContent(this,'orders.php')"><i class="fas fa-shopping-cart"></i> Orders</div>
            <div onclick="loadContent(this,'logout.php')"><i class="fas fa-sign-out-alt"></i> Logout</div>
        </div>
    </nav>
    <main>
        <div class="header">
            <div>
                <i class="fas fa-list hideNav"></i>
                <i class="fas fa-search"></i>
            </div>
            <div>
                <i class="fas fa-bell"></i>
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <i class="fas fa-cog"></i>
                <i class="fas fa-user"></i>
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>
        <div id="content"></div>
    </main>

    <script>
        $(document).ready(function () {
            var nav = $("nav");
            var isNavVisible = true;

            $(".hideNav").click(function () {
                if (isNavVisible) {
                    nav.animate({
                        width: 'toggle'
                    }, "veryfast");
                } else {
                    nav.animate({
                        width: 'toggle'
                    }, "veryfast");
                }
                isNavVisible = !isNavVisible;
            });

        });

        function loadContent(element, url) {
            $("#content").empty();
            console.log(url);
            $('#content').load(url);
            $('.active').removeClass('active');
            $(element).addClass('active');
        }

        function reloadContent(url, param1, param2) {
            $("#content").html("");
            $('#content').load(url + '?tri=' + param1 + '&asc=' + param2);
        }
    </script>
</body>

</html>