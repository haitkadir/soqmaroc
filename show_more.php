<?php include 'header.php'; ?>  

<!--
==============================
this is show more page. for show more details about broducts
==============================
-->
    <div class="show-more">
        <div class="container">
            
<?php 	
 
    //جلب ايدي المنتوج
    $ID = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    // Select All Data Depend On This ID
    $stmt = $con->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute(array($ID));
    $item = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {  ?>
            
            <div class="row flex-row-reverse">
                
<!--                start slick slide-->
                <div class="colomn col-lg-7">
                    <!-- start slide carousel-->
                    <div class="custom-slide">
<!--                     for check. if image empty don't print it-->
                      <?php if ($item['Image'] >= 1) {
                           echo '<div class="item">';
                            echo '<img class="d-block w-100" src="upload/img/'. $item['Image'] .'"/>';
                            echo '</div>';
                            }
                        if ($item['Image1'] >= 1) {
                           echo '<div class="item">';
                            echo '<img class="d-block w-100" src="upload/img/'. $item['Image1'] .'"/>';
                            echo '</div>';
                            }
                        if ($item['Image2'] >= 1) {
                           echo '<div class="item">';
                            echo '<img class="d-block w-100" src="upload/img/'. $item['Image2'] .'"/>';
                            echo '</div>';
                            }
                        if ($item['Image3'] >= 1) {
                           echo '<div class="item">';
                            echo '<img class="d-block w-100" src="upload/img/'. $item['Image3'] .'"/>';
                            echo '</div>';
                            }
                        if ($item['Image4'] >= 1) {
                           echo '<div class="item">';
                            echo '<img class="d-block w-100" src="upload/img/'. $item['Image4'] .'"/>';
                            echo '</div>';
                            }
                    ?>
                    </div>                   

                </div>
                
                <div class="colomn col-lg-5">
                    <!--the details of this product-->
                    <div class="details">
                        <h3><?php echo $item['Name'];?></h3>
                        <p><?php echo $item['Descr'];?></p>
                        
                        <div class="child-box">

                            <ul class="more-info list-unstyled">
                                <li><b><span class="i">DH</span> <?php echo $item['Price'];?></b></li>
                                <li><b><i class="lni-alarm-clock i"></i> <?php echo $item['Add_Date'];?></b></li>
                                <li><b><i class="lni-map i"></i> <?php echo $item['City'];?></b></li>
                                <li><b><i class="lni-user i"></i> <?php echo $item['Username'];?></b></li>
                            </ul>
                            <div class="mobile">
                                <h2><?php echo $item['Mobile'];?></h2>
                                <div>
<!--                                    <a href="#"><i class="lni-whatsapp"></i></a>-->
                                    <a href="#"><i class="lni-envelope"></i></a>
                                    <a href="tel:<?php echo $item['Mobile'];?>"><i class="lni-phone-handset"></i></a>
                                </div>
                            </div>
<!--                            start like-share box-->
                            <div class="like-share">

                                <div class="like">
                                    <?php //start LIKE sistyme
                                    $ip = getenv("remote_addr");// Get the IP of device
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $name    = filter_var($_POST['like'],    FILTER_SANITIZE_STRING);
                                        $name = 1;

                                        $stmt = $con->prepare("INSERT INTO alike (no_like, id_post, ip) VALUES (:zname, :id_s, :ips)"); 
                                        $stmt->execute(array('zname' =>  $name , 'id_s' =>  $ID, 'ips' => $ip));
                                    }
                                    $stmt = $con->prepare("SELECT id_post FROM alike
                                    WHERE id_post = ? AND ip = ?");
                                    $stmt->execute(array($ID, $ip));
                                    $row = $stmt->fetch();
                                    $count = $stmt->rowCount();

                                    $stmt = $con->prepare("SELECT id_post FROM alike
                                    WHERE id_post = ? ");
                                    $stmt->execute(array($ID,));
                                    $row = $stmt->fetch();
                                    $count1 = $stmt->rowCount();

                                    if ($count == 0 ) { ?>  

                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method= "post" >
                                            <div class="btn-like">
                                                <a><i class="lni-heart"></i></a>
                                                <input type="submit" value ="اعجبني" name="like" >
                                            </div>
                                        </form>
                                        <span>
                                            <?php echo $count1; ?>
                                        </span>
                                           <?php }else {
                                            echo "<div class='btn-like'>";
                                                echo '<a class="liked"><i class="lni-heart-filled"></i></a>';
                                            echo "</div>";
                                            echo '<span>' , $count1, '</span>';

                                            }   //نهاية الاعجاب
                                            ?>
                                </div>
                                
                                <div class="watch">
                                <a><i class="lni-eye"></i></a>
                                    <span>
                                        <?php  //بدية عرض عدد المشاهدة
                                            $stmt1 = $con->prepare("UPDATE items SET id_vi = ?  WHERE ID = ?");
                                            $stmt1->execute(array($item['id_vi'] + 1,$ID));
                                            $stmt1->rowCount();
                                            echo $item['id_vi'];//نهاية عرض عدد المشاهدة
                                        ?>
                                    </span>
                                </div>
                                
                                <div class="share-box">
                                    <a><i class="lni-reply"></i></a>
                                    <div class="share">
                                        <a class="close"><i class="lni-cross-circle"></i></a> 
                                        <h5><?php echo $lang['showMoreShareProduct']; ?></h5>
                                         <a class="face" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.soqmaroc.com%2Fshow_more.php%3F%26id=<?php echo $ID;?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="lni-facebook"></i></a>

                                        <a class="twit" href='https://twitter.com/intent/tweet?url=https%3A//www.soqmaroc.com/?&ID="<?php echo $_SERVER['REQUEST_URI'];;?>
                                           '><i class="lni-twitter"></i></a>
                                        <a class="whats" onclick="open_whatsapp()" data_Id="http://www.soqmaroc.com/show_more.php?&ID='<?php  $item['id']?>'"><i class="lni-whatsapp"></i></a>

                                    </div>
                                </div>
                                

                            </div>
                            
                        </div><!-- End child-box -->

                    </div><!-- End details box -->

                </div>



            </div>
            <?php } ?>




    <!--             start else products-->
            <h3 class="else-title"><?php echo $lang['showMoreElseProducts']; ?></h3>
            <hr/>
            <div class="row">
                
                
            <?php   
//                    $ID = $item['id'];
                    $name = $item['Name'];
                    $tage = $item['Tage'];
                    $address = $item['City'];
            /* البحث عن منتوجات ذات صالة*/
               $stmt = $con->prepare("SELECT * FROM items WHERE Tage LIKE '%{$tage}%'AND id NOT LIKE '{$ID}' LIMIT 20");
               $stmt->execute();
               $rwut = $stmt->fetchAll();
                   foreach ($rwut as $items) {?>

                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="product">
                        <h4 class="name text-center"><?php echo $items["Name"];?></h4>
                        <figure>
                            <img src="upload/img/<?php echo $items["Image"];?>" alt="product image">
                        </figure>
<!--                        <p class="desc"><?php //echo substr($items["Descr"], 0, 50);?> ...</p>-->
                        <h5 class="price text-center">DH <span><?php echo $items["Price"];?></span></h5>
                        <ul class="info list-unstyled"> 
                            <li class="city"><i class="lni-map-marker"></i> <?php echo $items["City"];?></li>
                            <li class="date"><i class="lni-alarm-clock"></i> <?php echo $items["Add_Date"];?></li>
                        </ul>
                        <a href='show_more.php?&id=<?php echo $items['id'];?>' class='btn'><i class='lni-list'></i>
                             <?php echo $lang['veiwDetails']; ?> </a>
                    </div>  
                </div>
                <?php } ?>
                
            </div>
       </div><!-- End container-->
    </div>
<?php include 'footer.php'; // footer Directory?> 