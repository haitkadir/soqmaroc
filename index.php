  
<?php include 'header.php'; ?> 

    <!-- Start header -->
        <div class="header">
            <div class="overlay">
                <div class="container">

                    <div class="intro">
                        <h1 class="welcome"><?php echo $lang['title']; ?></h1>
                        <p class="lead"><?php echo $lang['description']; ?></p>
                <!--start sarche-->
                        <div class="searche-box">
                            <form class="search" action="search.php" method="POST">
                                <div class="form-group">
                                    <i class="lni-pencil"></i>
                                    <input name="search" type="text" placeholder="<?php echo $lang['placeholderSarch']; ?>" />
                                </div>
                                <div class="form-group">
                                    <i class="lni-map-marker"></i>
                                    <select name="address">
                                        <option value="0">اختر المدينة</option>
                                        <option value="الدار البيضاء">الدار البيضاء</option>
                                        <option value="الرباط">الرباط</option>
                                        <option value="فاس">فاس</option>
                                        <option value="مراكش">مراكش</option>
                                        <option value="أكدير">أكدير</option>
                                        <option value="طنجة">طنجة</option>
                                        <option value="مكناس">مكناس</option>
                                        <option value="وجدة">وجدة</option>
                                        <option value="القنيطرة">القنيطرة</option>
                                        <option value="تطوان">تطوان</option>
                                        <option value="آسفي">آسفي</option>
                                        <option value="تمارة">تمارة</option>
                                        <option value="المحمدية">المحمدية</option>
                                        <option value="العيون">العيون</option>
                                        <option value="خريبكة">خريبكة</option>
                                        <option value="بني ملال">بني ملال</option>
                                        <option value="الجديدة">الجديدة</option>
                                        <option value="تازة">تازة</option>
                                        <option value="الناظور">الناظور</option>
                                        <option value="سطات">سطات</option>
                                        <option value="القصر الكبير">القصر الكبير</option>
                                        <option value="العرائش">العرائش</option>
                                        <option value="الخميسات">الخميسات</option>
                                        <option value="تزنيت">تزنيت</option>
                                        <option value="كلميم">كلميم</option>
                                        <option value="برشيد">برشيد</option>
                                        <option value="وادي زم">وادي زم</option>
                                        <option value="الفقيه بنصالح">الفقيه بنصالح</option>
                                        <option value="تاوريرت">تاوريرت</option>
                                        <option value="بركان">بركان</option>
                                        <option value="سيدي سليمان">سيدي سليمان</option>
                                        <option value="الراشيدية">الراشيدية</option>
                                        <option value="سيدي قاسم">سيدي قاسم</option>
                                        <option value="خنيفرة">خنيفرة</option>
                                        <option value="الداخلة">الداخلة</option>
                                        <option value="تيفلت">تيفلت</option>
                                        <option value="الصويرة">الصويرة</option>
                                        <option value="تارودانت">تارودانت</option>
                                        <option value="قلعة السراغنة">قلعة السراغنة</option>
                                        <option value="اولاد التايمة">اولاد التايمة</option>
                                        <option value="اليوسفية">اليوسفية</option>
                                        <option value="صفرو">صفرو</option>
                                        <option value="بنجرير">بنجرير</option>
                                        <option value="طانطان">طانطان</option>
                                        <option value="بولمان دادس">بولمان دادس</option>
                                        <option value="وزان">وزان</option>
                                        <option value="جرسيف">جرسيف</option>
                                        <option value="ورزازات">ورزازات</option>
                                        <option value="الحسيمة">الحسيمة</option>
                                        <option value="الفنيدق">الفنيدق</option>
                                        <option value="سوق السبت أولاد النمة">سوق السبت أولاد النمة</option>
                                        <option value="جرادة">جرادة</option>
                                        <option value="شفشاون">شفشاون</option>
                                        <option value="السمارة">السمارة</option>
                                        <option value="بوجدور">بوجدور</option>
                                        <option value="زاكورة">زاكورة</option>
                                        <option value="تاهلة">تاهلة</option>
                                        <option value="سلا">سلا</option>
                                        <option value="بويزكارن">بويزكارن</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <i class="lni-layers"></i>
                                    <select name="tage">
                                        <option value="0">اختار الفئات</option>
                                        <option disabled>الإلكترونيات</option>
                                        <option value="تليفونات">الهواتف</option>
                                        <option value="طابليط">طابليط</option>
                                        <option value="حاسوب محمول">حاسوب محمول</option>
                                        <option value="حاسوب منزلي">حاسوب منزلي</option>
                                        <option value="اكسسوارات الحواسيب والأجهزة">اكسسوارات الحواسيب والأجهزة</option>
                                        <option value="ألعاب الفيديو وأجهزة تشغيل">ألعاب الفيديو وأجهزة تشغيل</option>
                                        <option value="آلة تصوير او كامرا">آلة تصوير او كامرا</option>
                                        <option value="تلفزيون">تلفزيون</option>
                                        <option disabled>وسائل النقل</option>
                                        <option value="سيارات">سيارات</option>
                                        <option value="درجات نارية">درجات نارية</option>
                                        <option value="دراجات">دراجات</option>
                                        <option value="مركبات وألات مهنية">مركبات وألات مهنية</option>
                                        <option value="باطوّات">باطوّات</option>
                                        <option value="معدات مهنية">معدات مهنية</option>
                                        <option value="قطع الغيار لوسائل النقل">قطع الغيار لوسائل النقل</option>
                                        <option disabled>عقار</option>
                                        <option value="بارطما">بارطما</option>
                                        <option value="دار أو ڨيلا">دار أو ڨيلا</option>
                                        <option value="مكاتب">مكاتب</option>
                                        <option value="دكاكين، محلات تجارية و مباني صناعية">دكاكين، محلات تجارية و مباني صناعية</option>
                                        <option value="بقع و مزارع">بقع و مزارع</option>
                                        <option value="كراء للعطل">كراء للعطل</option>
                                        <option value="كراء مشترك">كراء مشترك</option>
                                        <option disabled>للمنزل و الحديقة</option>
                                        <option value="أجهزة الإلكترومناجي والأواني">أجهزة الإلكترومناجي والأواني</option>
                                        <option value="الأثاث والديكور">الأثاث والديكور</option>
                                        <option value="الحديقة و أدوات بريكولاج">الحديقة و أدوات بريكولاج</option>
                                        <option disabled>ملابس وجمال</option>
                                        <option value="ملابس">ملابس</option>
                                        <option value="أحذيية">أحذيية</option>
                                        <option value="ساعات و مجوهرات">ساعات و مجوهرات</option>
                                        <option value="حقائب وأكسسوارات">حقائب وأكسسوارات</option>
                                        <option value="ملابس للأطفال و الرٌدع">ملابس للأطفال و الرٌدع</option>
                                        <option value="منتجات التجميل">منتجات التجميل</option>
                                    </select>
                                </div>
                                <div class="search-btn">
                                    <button name="submit" type="submit" class="search-submit"><i class="lni-search"></i></button>
                                </div>                                
                            </form>
                        </div>
                        
                        
<!--                        download application box-->
                        <div class="down-app">
                            <h3><?php echo $lang['downloadAppH3']; ?></h3>
                            <p><?php echo $lang['downloadAppDesc']; ?></p>
                            <a href="https://play.google.com/store/apps/details?id=com.w_8603233">
                                <img src="images/playstore.png" />
                            </a>
                        </div>
                    
                        
                        
                    </div>
                </div>
            </div>
        </div>
<!--    Start products-->

        <div class="products">

            <div class="container">
                <div class="row">
                
<!--                    we will print data here using ajax and php-->
                
                </div>
                <div class="no-data"><?php echo $lang['noMoreData']; ?></div>
            </div>
            
            
        </div><!-- End products-->
        <div class="load-data">
            <div class='lds-roller'></div>
        </div>
<!--            start scroll to top-->
        <a class="scroll-up" id="scrollup">
            <i class="lni-chevron-up"></i>
        </a> 

   <?php include 'footer.php'; // footer Directory?> 