        <!--Start navbar-->
        

        <nav class="uprbar navbar navbar-expand-lg fixed-top">
            <div class="container">
              <a class="navbar-brand" href="index.php"><img src="images/logo3.png"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
              </button>
              <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php"><?php echo $lang['home']; ?> <span class="sr-only">(current)</span></a>
                  </li>
<!--
                  <li class="nav-item">
                    <a class="nav-link" href="upload.php"><?php echo $lang['jobs']; ?></a>
                  </li>
-->
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php"><?php echo $lang['contact']; ?></a>
                  </li>
                </ul>
                <ul class="navbar-nav m-l">
                  <li class="nav-item add">
                    <a class="nav-link" href="upload.php"><i class="lni-pencil-alt"></i> <?php echo $lang['postAd']; ?></a>
                  </li>
                </ul> 
              </div>
            </div>
        </nav>
        
        <!--End navbar-->
