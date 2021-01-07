<!-- cart.php -->
<?php 
session_start();
if(isset($_GET["p_id"]))  
 {  
 	$page = $_GET['page'];
      if(isset($_SESSION["shopping_cart"]))  

      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["p_id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["p_id"] 
                );  
                $_SESSION["shopping_cart"][$count] = $item_array; 
                // echo '<script>window.location="'.$page.'.php"</script>'; 
           }  
           else  
           { 
                echo '<script>alert("Item Already Added")</script>'; 
                echo '<script>window.location="'.$page.'.php"</script>';
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["p_id"] 
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      } 
    echo '<script>window.location="'.$page.'.php"</script>';    
 }  
 
 ?>      