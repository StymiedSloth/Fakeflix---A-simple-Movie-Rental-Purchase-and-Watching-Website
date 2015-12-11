<?php
    require 'dbaccess.php';
    require 'sessionaccess.php';

    
    $cart = $_SESSION['cart'];
    
    if($_SESSION['cartcount'] > 0)
    {
        foreach($_SESSION['cart'] as $movie)
        {
            $isRented = 0;
            $currentdate = date("Y-m-d H:i:s");
            $duedate = date('Y-m-d H:i:s', strtotime("+100 years"));
            if($movie[1] == "true")
            {
                $isRented = 1;
                $duedate = date('Y-m-d H:i:s', strtotime("+7 days"));
            }
                
            $insert_row = $conn->query("INSERT INTO orders (movie_id, customer_id, is_rented,date_ordered,due_date) VALUES(".$movie[0].",".$_SESSION['uid'].",". $isRented .",'". $currentdate ."','". $duedate ."')");
            
            if($insert_row){
                $_SESSION['cart'] = array(); 
                $_SESSION['cartcount'] = 0;
                echo "<p>success</p>";
            }else{
                echo "<p>fail</p>";
                die('Error : ('. $conn->errno .') '. $conn->error);                
            }       
        }
    }
    mysqli_close($conn);
?>
