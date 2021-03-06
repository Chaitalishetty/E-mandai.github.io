<?php
            session_start();
            $count=0;
            if(isset($_SESSION['shopping_cart'])){
                $count=count($_SESSION['shopping_cart']);
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"crossorigin="anonymous"></script>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>My Cart</title>
    <link rel = "icon" href ="./images/logo.png" type = "image/x-icon">
</head>

<body>
    <nav class="navbar navbar-dark bg-success">
        <div class="nav">
            <div class="sm-navbar">
                <i class="fa fa-bars" onclick="opennav()" style="font-size:25px;"></i>
            </div>

        </div>
        <a href="homepage.php"><img src="./images/E-MANDAI .png" class="logo"></a>
        <ul class="lg-nav">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="aboutus.php">About us</a></li>
        </ul>
        <!-- Navbar content -->
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </form>
        <?php
            $count=0;
            if(isset($_SESSION['shopping_cart'])){
                $count=count($_SESSION['shopping_cart']);
            }
        ?>
        <div id="cart_icon">
        <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:40px;color:black"></i></a>
        <span class="badge bg-primary"><?php echo $count?></span>
        </div>
        <a data-container="body" data-toggle="popover" data-placement="bottom" data-content="<a href='logout.php'>Logout</a>" data-html="true"
            id="user-icon-pop">
            <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
        </a>

    </nav>
    <div class="row" id="p_table">
        <div class="col-sm-8">
                <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="table-dark"scope="col" id="c_p_img">Image</th>
                    <th class="table-dark"scope="col">Name</th>
                    <th class="table-dark"scope="col">Quantity</th>
                    <th class="table-dark"scope="col">Price</th>
                    <th class="table-dark"scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($_SESSION['shopping_cart']))
                {
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $key => $value)
                    {
                ?>
                <tr>
                    <td id="c_p_img"><img src="<?php echo $value['item_image']?>" style="width:50px;height:auto;"></td>
                    <td><?php echo strtoupper($value['item_name'])?></td>
                    <td><?php echo $value['item_quantity']?></td>
                    <td><?php echo "&#8377;".$value['item_price']?></td>    
                    <td>
                     <a href="addcart.php" name="delete">Delete</a></td>
                
                <?php       
                    $total = $total + $value['item_price'];        
                    }
                    
                ?>
                </tr>
                <?php
                }
                else{
                    $total=0;
                }
                ?>
                
                
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
                <form method="POST" action="order.php">
                    <div class="card-body" style="text-align:center;">
                    <h3 class="card-title">TOTAL : 
                        <h4 class="card-text">(<?php echo $count?> items)</h4>
                        <h3 class="card-text">&#x20b9;<?php echo $total;?></h3>
                    </h3>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" name="c_address" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Phone no.</label>
                        <input type="text" class="form-control" name="c_number" id="formGroupExampleInput" placeholder="Enter your phone no.">
                    </div>
                    <input type="submit" class="btn btn-success" name="order_product" value="Order">
                <form>
        </div>
        </div>
    </div>      

    <div id="mynav" class="sidebar">
        <div class="nav_user">
            <i class="fa fa-times" onclick=closenav() id="nav_icon"></i>
            <div class="user_id">
                <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
                <!-- <a href="#"><i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i></a>
                        <h2>USER</h2> -->
            </div>
        </div>
        <ul>
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
            <li><a href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
            <li><a href="categories.php"><i class="fa fa-th-list" aria-hidden="true"></i>Categories</a></li>
            <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>My Cart</a></li>
            <li><a href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About us</a></li>
            <li><a href="logout.php"><button type="button" class="btn btn-success" name="logout" id="log_button">Log Out</button></a></li>
        </ul>

    </div>
</body>
<script>
    function opennav() {

        document.getElementById("mynav").style.width = "150px";
        document.getElementById("content").style.marginLeft = "150px";
        document.getElementsByClassName("sidebar").style.boxShadow = "0px 2px 10px 2px black;"
    }
    function closenav() {
        document.getElementById("mynav").style.width = "0";
        document.getElementById("content").style.marginLeft = "0";
    }
    $(function () {
            $('[data-toggle="popover"]').popover()
        })
</script>

</html>