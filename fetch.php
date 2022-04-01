
        <?php
         include 'config.php';
         include 'connect.php';

            $pageno = $_GET['lastId']; // get the last ID using ajax
            $no_of_records_per_page = 4;
            $offset = ($pageno-1) * $no_of_records_per_page;

            $stmt = $con->prepare("SELECT * FROM items  WHERE Add_Date ORDER BY Add_Date DESC LIMIT $offset, $no_of_records_per_page");
            $stmt->execute();
            $rwut = $stmt->fetchAll();
                foreach ($rwut as $rwo) {?>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="product">
                            <h4 class="name text-center"><?php echo $rwo["Name"];?></h4>
                            <figure>
                                <img src="upload/img/<?php echo $rwo["Image"];?>" alt="product image">
                            </figure>
                            <h5 class="price text-center">DH <span><?php echo $rwo["Price"];?></span></h5>
                            <p class="desc"><?php echo substr($rwo["Descr"], 0, 50);?> ...</p>
                            <ul class="info list-unstyled"> 
                                <li class="city"><i class="lni-map-marker"></i> <?php echo $rwo["City"];?></li>
                                <li class="date"><i class="lni-alarm-clock"></i> <?php echo $rwo["Add_Date"];?></li>
                            </ul>
                            <a href='show_more.php?&id=<?php echo $rwo['id'];?>' class='btn'><i class='lni-list'></i>
                             <?php echo $lang['veiwDetails']; ?> </a>
                        </div>
                    </div>
            <?php } ?>