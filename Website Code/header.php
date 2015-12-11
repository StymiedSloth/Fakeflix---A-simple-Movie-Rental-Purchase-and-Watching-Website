<div style="background-color:#AA66CC; display: table; width:100%; height: 40px; overflow: hidden;">
    <div id="site_title_div" style="display: table-cell; vertical-align: middle;">
    <img class="site_image" src="images/siteicon.png" height="36px" />
    <h2 class="site_title"> FAKEFLIX</h2>
    </div>
            <?php
            if (isset($_SESSION['uid']))
            {
            ?>
            <div style="display: table-cell; vertical-align: middle;float:right;">
                <form action="logout.php" style="margin-top:18px; display:inline;float:right;" method="post">
                    <input class="submitLink" type="submit" title="LOGOUT" value="LOGOUT" />
                </form>
                <?php
                if($_SESSION['uid'] != "0")
                {
                ?>
                <form action="order_history.php" style="margin-top:18px; display:inline;float:right;" method="post">
                    <input class="submitLink" type="submit" title="ORDERS" value="ORDERS" />
                </form>
                <img src="images/search.png" id="searchimage" height="36px"/>
                <form action="search.php" style="margin-top:18px; display:inline;float:right;" method="post">
                    <input class="submitLink" type="submit" title="SEARCH" value="SEARCH" />
                </form>
                <script type="text/javascript">
                    $('#searchimage').click(function(){
                    window.location = "search.php";
                    });
                </script>
                <?php 
                }
                ?>
            </div>
            <?php
            if($_SESSION['uid'] != "0")
                {
                ?>
            <div style="width:150px;display: table-cell; vertical-align: middle;">
            <span id="cartcount">        
                <img src="images/cart.png" style="margin-top:15px;" height="36px" />
                <h2 class="cart_title"><?php echo $_SESSION['cartcount']; ?></h2>
            </span>
            </div>
            <?php
                }
            }
            else {
                ?>
                <div style="display: table-cell; vertical-align: middle;float:right;">
                    <form action="login.php" style="margin-top:18px; display:inline;float:right;" method="post">
                        <input class="submitLink" type="submit" title="LOGIN" value="LOGIN" />
                    </form>
                </div>
                <?php
            }
            ?>
    </div>    
</div>