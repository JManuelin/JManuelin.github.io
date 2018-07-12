 <?php
    $mens="u.u";
    for($i=0;$i<count( $_SESSION['NAVGROUP']);$i++){
        
        if($_SERVER['REQUEST_URI']==$_SESSION['NAVGROUP'][$i]){
           $mens="EX";
            break;
        }
   
    }
 for($i=0;$i<count( $_SESSION['NAV']);$i++){
        
        if($_SERVER['REQUEST_URI']==$_SESSION['NAV'][$i]){
           $mens="EX";
            break;
        }
   
    }
    if($mens!='EX'){
    echo '<script>
			window.location="http://127.0.0.1/Hostal/view/alert.php";</script>'; 
       
    }
  
  
    
    ?>
    
