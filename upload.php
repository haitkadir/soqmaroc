<?PHP include "header.php";?>
<!-- start form upload-->
<div class="upload">
    <div class="container">
        <h1 class="text-center"><?php echo $lang['uploadHeading']; ?></h1>
        <p class="text-center"><?php echo $lang['uploadDesc']; ?></p>
        <form class="form-upload" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <select class="categ form-control" name="tage">
                            <option value="اختار الفئات">اختار الفئات</option>
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
                        <div class="alert alert-categ" data-erorr="<?php echo $lang['uploadCategErorr'];?>"></div>
                        <input name="name" type="text" class="title form-control" placeholder="<?php echo $lang['uploadNamePlace'];?>" />
                        <div class="alert alert-title" data-erorr1="<?php echo $lang['uploadNameErorr1'];?>" data-erorr2="<?php echo $lang['uploadNameErorr2'];?>" data-erorr3="<?php echo $lang['uploadNameErorr3'];?>"></div>
                        <textarea name="text" id="desc" class="desc form-control" maxlength="200" placeholder="<?php echo $lang['uploadDescPlace'];?>"></textarea>
                        <div class="countr" data-msg="<?php echo $lang['uploadDescMsg'];?>: "></div>
                        <div class="alert alert-desc" data-erorr1="<?php echo $lang['uploadDescErorr1'];?>" data-erorr2="<?php echo $lang['uploadDescErorr2'];?>"></div>
                        <input name="pric" type="number" class="price form-control" placeholder="<?php echo $lang['uploadPricePlace'];?>" />
                        <div class="alert alert-price" data-erorr1="<?php echo $lang['uploadPriceErorr1'];?>" data-erorr2="<?php echo $lang['uploadPriceErorr2'];?>"></div>
                        <select name="address" class="select-location  form-control">
                            <option value="اختر المدينة">اختر المدينة</option>
                            <option value="الدار البيضاء">الدار البيضاء</option>
                            <option value="الرباط">الرباط</option>
                            <option value="فاس">فاس</option>
                            <option value="مراكش">مراكش</option>
                            <option value="أكدير">أكدير</option>
                            <option value="طنجة">طنجة</option>
                            <option value="مكناس">مكناس</option>
                            <option value="وجدة">وجدة</option>
                            <option value="تاوريرت وجدة">تاوريرت وجدة</option>
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
                            <option value="أولاد النمة">أولاد النمة</option>
                            <option value="جرادة">جرادة</option>
                            <option value="شفشاون">شفشاون</option>
                            <option value="السمارة">السمارة</option>
                            <option value="بوجدور">بوجدور</option>
                            <option value="زاكورة">زاكورة</option>
                            <option value="تاهلة">تاهلة</option>
                            <option value="سلا">سلا</option>
                            <option value="بويزكارن">بويزكارن</option>
                        </select>
                        <div class="alert alert-location" data-erorr="<?php echo $lang['uploadLocationErorr'];?>"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group preview-img">
                      <h6 class="text-center"><?php echo $lang['uploadImgLable'];?></h6>
                      <div class="inputs-imgs">
                          <a><i class="lni-folder"></i> <?php echo $lang['uploadImgPlace'];?></a>
                          <input id="upload" name="img" type="file" accept="image/*" class="imginput1" onchange="readURL(this, '.imginput1');" />
                          <input id="upload1" name="img1" type="file" accept="image/*" class="imginput2" onchange="readURL(this, '.imginput2');" />
                          <input id="upload2" name="img2" type="file" accept="image/*" class="imginput3" onchange="readURL(this, '.imginput3');" />
                          <input id="upload3" name="img3" type="file" accept="image/*" class="imginput4" onchange="readURL(this, '.imginput4');" />
                          <input id="upload4" name="img4" type="file" accept="image/*" class="imginput5" onchange="readURL(this, '.imginput5');" />
                      </div>
                      <ul class='preview list-unstyled'>
                          <li><img src="images/preview.png" /></li><li><img src="images/preview.png" /></li><li><img src="images/preview.png" /></li>
                          <li><img src="images/preview.png" /></li><li><img src="images/preview.png" /></li>
                      </ul>
                      <div class="alert alert-preview text-center" data-erorr1="<?php echo $lang['uploadImgErorr1'];?>" data-erorr2="<?php echo $lang['uploadImgErorr2'];?>"></div>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input name="username" type="text" class="user form-control" placeholder="<?php echo $lang['uploadUserPlace'];?>" />
                        <div class="alert alert-user" data-erorr1="<?php echo $lang['uploadUserErorr1'];?>" data-erorr2="<?php echo $lang['uploadUserErorr2'];?>" data-erorr3="<?php echo $lang['uploadUserErorr3'];?>"></div>
                        <input name="moble" type="tel" class="mobile form-control" placeholder="<?php echo $lang['uploadPhonePlace'];?>" />
                        <div class="alert alert-mobile" data-erorr1="<?php echo $lang['uploadPhoneErorr1'];?>" data-erorr2="<?php echo $lang['uploadPhoneErorr2'];?>" data-erorr3="<?php echo $lang['uploadPhoneErorr3'];?>"></div>
                    <button class="submit btn-block" type="submit"><i class="lni-pencil-alt"></i> <?php echo $lang['uploadSubmitBtn'];?></button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>    
<!--End form upload-->
<?php include 'footer.php';?>