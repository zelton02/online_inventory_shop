<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .header-links.pull-left {
            display: flex;
            list-style-type: none; /* Remove bullet points */
            padding: 0; /* Remove default padding */
        }

        .header-links.pull-left li {
            margin-right: 20px; /* Adjust spacing between list items */
        }

        .search-input {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-select {
            flex: 1;
            border: none;
            padding: 10px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .input {
            flex: 3;
            border: none;
            padding: 10px;
        }

        .search-btn {
            border: none;
            background-color: #00bcd4;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .left-border-radius {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .right-border-radius {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }


        .header-ctn {
            display: flex;
            align-items: center;
        }

        .cart-btns a {
            margin-right: 10px;
        }

        .menu-toggle {
            margin-left: auto;
        }



    </style>
</head>

<body style="background: #fff;">
<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +91-9964716807</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> nikhilkeshav76@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Mysore</a></li>
            </ul>
        </div>
    </div>
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <font style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif">
                                <img src="./img/Capture.png" style="width: 150px;">
                            </font>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <div class="search-input">
                                <select class="input-select left-border-radius">
                                    <option value="0">All Categories</option>
                                </select>
                                <input class="input" id="search" type="text" placeholder="Search here">
                                <button type="submit" id="search_btn" class="search-btn right-border-radius">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->


                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="badge qty">0</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list" id="cart_product"></div>
                                <div class="cart-btns">
                                    <a href="{{ route('cart.index' )}}" style="width:100%;"><i class="fa fa-edit"></i> Edit Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <a href="{{ route('home' )}}">Menu</a>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->

            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<br>


   