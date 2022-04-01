/*global document, window, setTimeout, FileReader, $ */

//for check upload form errors
var tageErr = true, nameErr = true, descErr = true, priceErr = true, cityErr = true, userErr = true, mobileErr = true, imgErr = true;


$(function () {//Start document.ready function
    'use strict';

/*
============================
trager slick slider fremowrk
============================
*/
    $('.custom-slide').slick({
        rtl: true,
        dots: true,
        infinite: true,
        speed: 500,
        fade: false,
        cssEase: 'linear',
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>'
    });

/******Start global*****/

    
//    hide navbar when user scrolling down. and show it when user scrolling up
//    function showORhideNavbar() {
//        var prevScrollpos = window.pageYOffset
//        window.onscroll = function() {
//          var currentScrollPos = window.pageYOffset;
//          if (prevScrollpos > currentScrollPos) {
//
//            $(".uprbar").css('top', '0');
//            $('.searche-box .openclose').css('right', '-40px');
//
//          } else {
//
//            $(".uprbar").css('top', '-52px');
//            $('.searche-box .openclose').css('right', '0px');
//
//          }
//          prevScrollpos = currentScrollPos;
//        }
//    }
//
//    setTimeout(function () {
//        showORhideNavbar();
//    }, 3000);


//    Click on the Menu Icon to transform it to "X"
    $('.uprbar .navbar-toggler').on('click', function () {
        $(this).toggleClass('change');
    });

    // scrollUp
    var scrollButton = $('#scrollup');
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 700) {
            scrollButton.css('display', 'block');
        } else {
            scrollButton.hide();
        }
    });
    //go to top by onclick
    scrollButton.click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
    }); 

//change document title and change active class in navbar list

    if ($('div:first-of-type').hasClass('upload')) {
        $('.navbar-nav li').removeClass('active');
        $("nav.uprbar").addClass('nav-background');
        document.title = "اضفات منتاج";
    } else if ($('div:first-of-type').hasClass('contact')) {
        $('.navbar-nav li:nth-child(2)').siblings().removeClass('active').end().addClass('active');
        $("nav.uprbar").addClass('nav-background');
        document.title = "اتصل بنا";
    } else if ($('div:first-of-type').hasClass('show-more')) {
        $('.navbar-nav li:first-child').siblings().removeClass('active').end().addClass('active');
        $("nav.uprbar").addClass('nav-background');
        document.title = "عرض التفاصيل";
    } else {
        $('.navbar-nav li:first-child').siblings().removeClass('active').end().addClass('active');
        $("nav.uprbar").removeClass('nav-background');

        $(window).on('scroll', function () {
            if ($(this).scrollTop() >= 630){
                $(".uprbar").addClass('nav-background');
            }else{
                $(".uprbar").removeClass('nav-background');
            }
        });
    }
/******End global*****/
/******Start index page*****/
    /***Start header***/

    
    
/******End index page*****/
/*
===============================
start show more page
===============================
*/
    
//    for show or hide share box
    $(".like-share .share-box > a").on('click', function () {
        $(this).siblings('.share').show(600);
    });
    $(".like-share .share .close").on('click', function () {
        $(this).parent('.share').hide(600);
    });

//    for hide and whow text when it's more than 100 chracters

var MORE = "المزيد ...",
    LESS = " اقل...";
    $(".else-product p").each(function(){
        var $ths = $(this),
            txt = $ths.text();

        //Clear the text
        $ths.text("");

        //First 100 chars
        $ths.append($("<span>").text(txt.substr(0,30)));

        //The rest
        $ths.append($("<span>").text(txt.substr(30, txt.length)).hide());

        //More link
        $ths.append(
            $("<a>").text(MORE).addClass('see-more').click(function(){
                var $ths = $(this);

                if($ths.text() == MORE){
                    $ths.prev().show();
                    $ths.text(LESS);
                }
                else{
                    $ths.prev().hide();
                    $ths.text(MORE);
                }
            })
        );
    });


/*
===============================
start upload page
===============================
*/
//    Start calculate characters remening
    var maxtext = $('#desc').attr('maxlength'),
        counterMsg = $('.upload .countr').data('msg');
    $('.upload .countr').html(counterMsg + '<span>' + maxtext + '</span>');

    $('#desc').keyup(function () {
        var textlength = $(this).val().length,
            remchars = maxtext - textlength;
        $('.upload .countr').html(counterMsg + '<span>' + remchars + '</span>');
    });
    //End calculate characters remening

//    Start valedation form

    $('.form-upload .submit').click(function () {
        // e.preventDefault();
        var categ = $('.categ'),
            alertCateg = $('.alert-categ'),
            alertCategErorr = alertCateg.data('erorr'),
            title = $('.title'),
            alertTitle = $('.alert-title'),
            alertTitleErorr1 = alertTitle.data('erorr1'),
            alertTitleErorr2 = alertTitle.data('erorr2'),
            alertTitleErorr3 = alertTitle.data('erorr3'),
            desc = $('.desc'),
            alertDesc = $('.alert-desc'),
            alertDescErorr1 = alertDesc.data('erorr1'),
            alertDescErorr2 = alertDesc.data('erorr2'),
            
            price = $('.price'),
            alertPrice = $('.alert-price'),
            alertPriceErorr1 = alertPrice.data('erorr1'),
            alertPriceErorr2 = alertPrice.data('erorr2'),
            
            selectLocation = $('.select-location'),
            alertLocation = $('.alert-location'),
            alertLocationErorr = alertLocation.data('erorr'),
            
            user = $('.user'),
            alertUser = $('.alert-user'),
            alertUserErorr1 = $('.alert-user').data('erorr1'),
            alertUserErorr2 = $('.alert-user').data('erorr2'),
            alertUserErorr3 = $('.alert-user').data('erorr3'),
            
            phone = $('.mobile'),
            alertMobile = $('.alert-mobile'),
            alertMobileErorr1 = alertMobile.data('erorr1'),
            alertMobileErorr2 = alertMobile.data('erorr2'),
            alertMobileErorr3 = alertMobile.data('erorr3'),
            
            img1 = $('.preview li:first-child img').attr('src'),
            img2 = $('.preview li:nth-child(2) img').attr('src'),
            img3 = $('.preview li:nth-child(3) img').attr('src'),
            img4 = $('.preview li:nth-child(4) img').attr('src'),
            img5 = $('.preview li:last-child img').attr('src'),
            alertPreview = $('.alert-preview'),
            alertPreviewErorr1 = $('.alert-preview').data('erorr1');


        if (categ.val() === "اختار الفئات") {
            alertCateg.text(alertCategErorr);
            tageErr = true;
        } else {
            alertCateg.text('');
            tageErr = false;
        }
//        name
        if (title.val().length === 0) {
            alertTitle.text(alertTitleErorr1);
            nameErr = true;
        } else if (title.val().length <= 3) {
            alertTitle.text(alertTitleErorr2);
            nameErr = true;
        } else if (title.val().length >= 20) {
            alertTitle.text(alertTitleErorr3);
            nameErr = true;
        } else {
            alertTitle.text('');
            nameErr = false;
        }
//        description
        if (desc.val().length === 0) {
            alertDesc.text(alertDescErorr1);
            descErr = true;
        } else if (desc.val().length <= 9) {
            alertDesc.text(alertDescErorr2);
            descErr = true;
        } else {
            alertDesc.text('');
            descErr = false;
        }
//        price
        if (price.val().length === 0) {
            alertPrice.text(alertPriceErorr1);
            priceErr = true;
        } else if (price.val().length >= 20) {
            alertPrice.text(alertPriceErorr2);
            priceErr = true;
        } else {
            alertPrice.text('');
            priceErr = false;
        }
//        City
        if (selectLocation.val() === "اختر المدينة") {
            alertLocation.text(alertLocationErorr);
            
            cityErr = true;
        } else {
            alertLocation.text('');
            cityErr = false;
        }
        //images
        if (img1 !== "images/preview.png" || img2 !== "images/preview.png" || img3 !== "images/preview.png" || img4 !== "images/preview.png" || img5 !== "images/preview.png") {
            imgErr = false;
        } else {
            alertPreview.text(alertPreviewErorr1);
            imgErr = true;
        }
        //username
        if (user.val().length === 0) {
            alertUser.text(alertUserErorr1);
            userErr = true;
        } else if (user.val().length <= 2) {
            alertUser.text(alertUserErorr2);
            userErr = true;
        } else if (user.val().length >= 20) {
            alertUser.text(alertUserErorr3);
            userErr = true;
        } else {
            alertUser.text('');
            userErr = false;
        }
        //mobile
        if (phone.val().length === 0) {
            alertMobile.text(alertMobileErorr1);
            mobileErr = true;
        } else if (phone.val().length < 10) {
            alertMobile.text(alertMobileErorr2);
            mobileErr = true;
        } else if (phone.val().length > 15) {
            alertMobile.text(alertMobileErorr3);
            mobileErr = true;
        } else {
            alertMobile.text('');
            mobileErr = false;
        }
        

    });//  End valdation Upload form

/*******End upload page********/

/******** start contact Us **********/

    //start validation form contact

    $('.form-contact').submit(function (e) {
        var user = $('.form-contact input[name="user"]'),
            userv = user.val(),
            mail = $('.form-contact input[name="email"]'),
            mailv = mail.val(),
            message = $('.form-contact textarea'),
            messagev = message.val(),
            alertUser = $('.form-contact .alert-user'),
            alertUserErorr1 = alertUser.data('erorr1'),
            alertUserErorr2 = alertUser.data('erorr2'),
            alertUserErorr3 = alertUser.data('erorr2'),
            
            alertMail = $('.form-contact .alert-email'),
            alertMailErorr1 = alertMail.data('erorr1'),
            alertMailErorr2 = alertMail.data('erorr2'),
            
            alertMsg = $('.form-contact .alert-msg'),
            alertMsgErorr1 = alertMsg.data('erorr1'),
            alertMsgErorr2 = alertMsg.data('erorr2'),
            
            mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
        if (userv.length === 0) {
            e.preventDefault();
            alertUser.text(alertUserErorr1);
            user.siblings('.asterisx').fadeIn(200);
        }else if (userv.length < 4) {
            alertUser.text(alertUserErorr2);
            user.siblings('.asterisx').fadeIn(200);
            e.preventDefault();
        }else if (userv.length > 20) {
            alertUser.text(alertUserErorr2);
            user.siblings('.asterisx').fadeIn(200);
            e.preventDefault();
        }else {
            alertUser.text('');
            user.siblings('.asterisx').fadeOut(200);
        }
        //validate email
        if (mailv.length === 0) {
            mail.siblings('.asterisx').fadeIn(200);
            alertMail.text(alertMailErorr1);
            e.preventDefault();
        } else if (mailv.match(mailformat)) {
            alertMail.text('');
            mail.siblings('.asterisx').fadeOut(200);
        } else {
            mail.siblings('.asterisx').fadeIn(200);
            alertMail.text(alertMailErorr2);
            e.preventDefault();
        }
        //validation message input
        if (messagev.length === 0) {
            message.siblings('.asterisx').fadeIn(200);
            alertMsg.text(alertMsgErorr1);
            e.preventDefault();
        }else if (messagev.length < 10) {
            message.siblings('.asterisx').fadeIn(200);
            alertMsg.text(alertMsgErorr2);
            e.preventDefault();
        }else {
            message.siblings('.asterisx').fadeOut(200);
            alertMsg.text('');
        }



    });
    /***End contact Us***/

});// End document.ready function
//upload pages
//عرض الصورة عند اكتمال تحميلها في صفحة upload

function hideOrShowImg(imgSelector) {
    'use strict';
    if (imgSelector.attr('src') === '') {
        imgSelector.css('opacity', '0');
    } else {
        imgSelector.css('opacity', '1');
    }
}

function readURL(input, cl) {
    'use strict';
//    this for fixeing scroll when this funciton happend
    var currentScrollPos = window.pageYOffset;
    $('html, body').animate({
        scrollTop: currentScrollPos
    }, 0);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onloadend = function (e) {
            var mimg = $('.preview li:first-child img'),
                mimg1 = $('.preview li:nth-child(2) img'),
                mimg2 = $('.preview li:nth-child(3) img'),
                mimg3 = $('.preview li:nth-child(4) img'),
                mimg4 = $('.preview li:last-child img'),
                inputVal = $(cl).val(),
                alertPreview = $('.alert-preview'),
                alertPreviewErorr1 = $('.alert-preview').data('erorr1'),
                alertPreviewErorr2 = $('.alert-preview').data('erorr2'),
                extension1 = inputVal.split('.').pop().toUpperCase();
            function print() {
                if ($(cl).hasClass('imginput1')) {
                    mimg.attr('src', e.target.result);
                    hideOrShowImg(mimg);
                    $('.inputs-imgs .imginput1').animate({
                        zIndex: '0'
                    }, 0, function () {
                        $('.inputs-imgs .imginput2').css('z-index', '1');
                    });
                } else if ($(cl).hasClass('imginput2')) {
                    mimg1.attr('src', e.target.result);
                    hideOrShowImg(mimg1);
                    $(cl).animate({
                        zIndex: '0'
                    }, 0, function () {
                        $('.inputs-imgs .imginput3').css('z-index', '1');
                    });
                }  else if ($(cl).hasClass('imginput3')) {
                    mimg2.attr('src', e.target.result);
                    hideOrShowImg(mimg2);
                    $(cl).animate({
                        zIndex: '0'
                    }, 0, function () {
                        $('.inputs-imgs .imginput4').css('z-index', '1');
                    });
                }  else if ($(cl).hasClass('imginput4')) {
                    mimg3.attr('src', e.target.result);
                    hideOrShowImg(mimg3);
                    $(cl).animate({
                        zIndex: '0'
                    }, 0, function () {
                        $('.inputs-imgs .imginput5').css('z-index', '1');
                    });
                }  else if ($(cl).hasClass('imginput5')) {
                    mimg4.attr('src', e.target.result);
                    hideOrShowImg(mimg4);
                    $(cl).animate({
                        zIndex: '0'
                    }, 0);
                }
            }//End function print();
            if ($(cl).length !== 0) {
                alertPreview.text('');
                if (extension1 !== "PNG" && extension1 !== "JPG" && extension1 !== "GIF" && extension1 !== "JPEG") {
                    alertPreview.text(alertPreviewErorr2);
                } else {
                    alertPreview.text('');
                    print();
                }
            } else {
                alertPreview.text(alertPreviewErorr1);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}//End function readURL();
