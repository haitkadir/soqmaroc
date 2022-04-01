<?php include 'connect.php'; ?> 
<?php 
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             $search  = filter_var($_POST['search'],  FILTER_SANITIZE_STRING);
            $tage    = filter_var($_POST['tage'],    FILTER_SANITIZE_STRING);
            $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);             
             
            $stmt1 = $con->prepare("SELECT * FROM items WHERE Tage LIKE '{$tage}' AND City LIKE '{$address}' AND Name LIKE '%{$search}%'");
            $stmt1->execute();
            $count1 = $stmt1->rowCount();
             
            if ($count1 > 0) {
                $rwut1 = $stmt1->fetchAll();
                foreach ($rwut1 as $items1) { ?>

                     <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                        <div class="product">
                            <h4 class="name text-center"><?php echo $items1["Name"];?></h4>
                            <figure>
                                <img src="upload/img/<?php echo $items1["Image"];?>" alt="product image">
                            </figure>
                            <h5 class="price text-center">DH <span><?php echo $items1["Price"];?></span></h5>
                            <p class="desc"><?php echo substr($items1["Descr"], 0, 50);?> ...</p>
                            <ul class="info list-unstyled"> 
                                <li class="city"><i class="lni-map-marker"></i> <?php echo $items1["City"];?></li>
                                <li class="date"><i class="lni-alarm-clock"></i> <?php echo $items1["Add_Date"];?></li>
                            </ul>
                            <?php echo " <a href='show_more.php?&id=" . $items1['id'] ."' class='btn'><i class='lni-list'></i>
                             View Details </a>";?>
                        </div>
                    </div>

         <?php  }
       } else { 

        $stmt = $con->prepare("SELECT * FROM items WHERE Tage LIKE '{$tage}' OR City LIKE '{$address}'");
        $stmt->execute();
        $count = $stmt->rowCount();
            if ($count > 0) {
            $rwut = $stmt->fetchAll();
            foreach ($rwut as $items2) { ?>

         <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
            <div class="product">
                <h4 class="name text-center"><?php echo $items2["Name"];?></h4>
                <figure>
                    <img src="upload/img/<?php echo $items2["Image"];?>" alt="product image">
                </figure>
                <h5 class="price text-center">DH <span><?php echo $items2["Price"];?></span></h5>
                <p class="desc"><?php echo substr($items2["Descr"], 0, 50);?> ...</p>
                <ul class="info list-unstyled"> 
                    <li class="city"><i class="lni-map-marker"></i> <?php echo $items2["City"];?></li>
                    <li class="date"><i class="lni-alarm-clock"></i> <?php echo $items2["Add_Date"];?></li>
                </ul>
                <?php echo " <a href='show_more.php?&id=" . $items2['id'] ."' class='btn'><i class='lni-list'></i>
                 View Details </a>";?>
            </div>
        </div> 
<?php
  }
}else{

       $stmt2 = $con->prepare("SELECT * FROM items WHERE Name LIKE '%{$search}%'");
        $stmt2->execute();
        $count = $stmt2->rowCount();
            $rwut = $stmt2->fetchAll();
            foreach ($rwut as $items3) { ?>

             <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                <div class="product">
                    <h4 class="name text-center"><?php echo $items3["Name"];?></h4>
                    <figure>
                        <img src="upload/img/<?php echo $items3["Image"];?>" alt="product image">
                    </figure>
                    <h5 class="price text-center">DH <span><?php echo $items3["Price"];?></span></h5>
                    <p class="desc"><?php echo substr($items3["Descr"], 0, 50);?> ...</p>
                    <ul class="info list-unstyled"> 
                        <li class="city"><i class="lni-map-marker"></i> <?php echo $items3["City"];?></li>
                        <li class="date"><i class="lni-alarm-clock"></i> <?php echo $items3["Add_Date"];?></li>
                    </ul>
                    <?php echo " <a href='show_more.php?&id=" . $items3['id'] ."' class='btn'><i class='lni-list'></i>
                     View Details </a>";?>
                </div>
            </div> 
    <?php  
                                       
     }
    }
} } else { header('location: soqmaroc.com');  } 
   
?>