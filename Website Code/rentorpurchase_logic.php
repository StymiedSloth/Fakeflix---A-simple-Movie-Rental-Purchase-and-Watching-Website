<div class="header_div">
    <div align="center" class="form-div" style="height:45px;line-height:15px;background-color:#AA66CC ;width:50%;display:inline;float:left;">
    <?php
        $page_to_direct = "addtocart.php";
        if($ordercountrow['count'] > 0)
        {
            $page_to_direct = "watch_movie.php";
        }
            ?>
        <form class="proform" action="<?php echo $page_to_direct; ?>" method="get">
                <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />
                <input type="hidden" name="isRent" value="true" />
        </form>
        <?php
        if($ordercountrow['count'] > 0)
        {
            $duedate = $orderrow['due_date'];
        ?>
        <div class="countdown-styled"></div>
        <script>
        $(function(){
            var endDate = "<?php echo date("F j, Y G:i:s", strtotime($duedate)); ?>";

            $('.countdown-styled').countdown({
              date: endDate,
              render: function(data) {
                <?php 
                if($orderrow['is_rented'] == 1)
                {
                ?>
                $(this.el).html("<div>WATCH THIS MOVIE, RENTED FOR " + this.leadingZeros(data.days, 2) + " <span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>sec</span></div>");
                <?php 
                }
                else
                {
                ?>
                $(this.el).html("<div>CLICK HERE TO WATCH THIS MOVIE ( PURCHASED )</div>");
                <?php
                }
                ?>
              }
            });
        });
        </script>
        <?php
        }
        else
        {
        ?>
        <a class="rentpurchase_links">CLICK HERE TO RENT THIS MOVIE FOR $<?php echo $row['price']; ?> </a>
        <?php
        }
        ?>
    </div> 
    <?php
        if($ordercountrow['count'] <= 0 || ( $ordercountrow['count'] > 0 && $orderrow['is_rented'] == 1))
        {
    ?>
    <div align="center" class="form-div" style="height:45px;line-height:15px;background-color:#0099CC  ;width:50%;display:inline;float:right;">
        <form class="proform" action="addtocart.php" method="get">
                <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />  
                <input type="hidden" name="isRent" value="false" />
        </form>
        <a class="rentpurchase_links">CLICK HERE TO PURCHASE THIS MOVIE FOR $<?php echo $row['purchase_price']; ?></a>
    </div>
    <?php 
    }
    else {
        ?>
        <div align="center" style="height:45px;line-height:15px;background-color:#AA66CC  ;width:50%;display:inline;float:right;">
        </div>
        <?php
    }
    ?>
</div>