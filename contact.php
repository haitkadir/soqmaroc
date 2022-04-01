

 <?php include 'header.php';?>
    <div class="contact">
        <div class="container">
            <form class="form-contact" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <h2 class="text-center"><?php echo $lang['contactHeading'];?></h2>
                <p class="text-center text-info"><?php echo $lang['contactDesc'];?></p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input name="user" type="text" class=" form-control" placeholder="<?php echo $lang['contactUserPlace'];?>" />
                            <i class="lni-user"></i>
                            <span class="asterisx">*</span>
                        </div>
                        <div class="alert alert-user" data-erorr1="<?php echo $lang['contactUserErorr1'];?>" data-erorr2="<?php echo $lang['contactUserErorr2'];?>" data-erorr3="<?php echo $lang['contactUserErorr3'];?>"></div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="<?php echo $lang['contactEmailPlace'];?>" />
                            <i class="lni-envelope"></i>
                            <span class="asterisx">*</span>
                        </div>
                        <div class="alert alert-email" data-erorr1="<?php echo $lang['contactEmailErorr1'];?>" data-erorr2="<?php echo $lang['contactEmailErorr2'];?>"></div>
                        <div class="form-group">
                            <input name="tel" type="tel" class="form-control" placeholder="رقم الهاتف" />
                            <i class="lni-phone"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <textarea name="msg" class="form-control" placeholder="<?php echo $lang['contactMsgPlace'];?>"></textarea>
                            <span class="asterisx">*</span>
                        </div>
                        <div class="alert alert-msg" data-erorr1="<?php echo $lang['contactMsgErorr1'];?>" data-erorr2="<?php echo $lang['contactMsgErorr2'];?>"></div>
                        <div class="form-group">
                            <button type="submit"><?php echo $lang['contactSend'];?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include "footer.php" ?>