var action = 'inactive',
    lastId = 1,
    san = 1;
//    for send form data and response the value
    $('.searche-box form.search').on('submit', function (e) {
        'use strict';
        e.preventDefault();
        $('.searche-box').removeClass('focuse');
        var moveScroll = $('html, body').animate({
                    scrollTop: $('.products').offset().top - 52
                }, 1500);
        $.ajax({
            type: 'post',
            url: 'search.php',
            data: $('.searche-box form.search').serialize(),
            success: function (data) {
                $('.products .row div').remove();
                $('.products .row').append(data);
                action = 'active';
                $('.products .no-data').show(500);
                
                if(!$.trim(data)) {
                    moveScroll

                    $('.products .no-data').show(500).delay(2000).delay(0, function () {
                        location.reload("index.php");

                    });
                    

                    return action;
                } else {
                    moveScroll
                }
               
            }
        });
    });
    
    


    
    
function load_products_data() {
    'use strict';
    $.ajax({
        url:"fetch.php?lastId=" + lastId,
        method:"POST",
        cache:false,
        success:function(data) {
            $('.products .row').append(data);
            if(!$.trim(data)) {
                action = 'active';
                $('.products .no-data').show();
            } else {
                action = "inactive";
                lastId = lastId + 1;
            }     
        }
    });   
}
function startLoad() {
    'use strict';
    if($(window).scrollTop() + $(window).height() > $(".products .row").height() && action == 'inactive') {
        action = 'active';
        setTimeout(function(){
            load_products_data();
        }, 1000);
    }
}

if ($('div:first-of-type').hasClass('header')) {
    startLoad();
    $(window).scroll(function(){
        startLoad();
    });
}
    
//for ad animation loading 
$(document).ajaxStart(function () {
    $('.load-data').show();
}).ajaxComplete(function () {
    $('.load-data').hide();
});



const options = {
  targetSize: 0.15,
  quality: 0.75,
  maxWidth: 1600,
  maxHeight: 1600
}
var upload = document.getElementById("upload"),
    upload1 = document.getElementById("upload1"),
    upload2 = document.getElementById("upload2"),
    upload3 = document.getElementById("upload3"),
    upload4 = document.getElementById("upload4"),
    img, imgname, img1, imgname1, img2, imgname2, img3, imgname3, img4, imgname4;

function compressAndUpload(upload, upload1, upload2, upload3, upload4) {
const compress = new Compress(options)

upload.addEventListener("change", (e) => {
    const files = [...e.target.files]
    compress.compress(files).then((conversions) => {
      const {  photo } = conversions[0]
        img = photo.data;
        imgname = photo.name;
    })
  }, false)
upload1.addEventListener("change", (e) => {
    const files = [...e.target.files]
    compress.compress(files).then((conversions) => {
      const {  photo } = conversions[0]
        img1 = photo.data;
        imgname1 = photo.name; 
    })
  }, false)
upload2.addEventListener("change", (e) => {
    const files = [...e.target.files]
    compress.compress(files).then((conversions) => {
      const {  photo } = conversions[0]
        img2 = photo.data;
        imgname2 = photo.name;  
    })
  }, false)
upload3.addEventListener("change", (e) => {
    const files = [...e.target.files]
    compress.compress(files).then((conversions) => {
      const {  photo } = conversions[0]
        img3 = photo.data;
        imgname3 = photo.name;
    })
  }, false)
upload4.addEventListener("change", (e) => {
    const files = [...e.target.files]
    compress.compress(files).then((conversions) => {
      const {  photo } = conversions[0]
        img4 = photo.data;
        imgname4 = photo.name;  
    })
  }, false)
    
} 
compressAndUpload(upload, upload1, upload2, upload3, upload4);  

  $('.form-upload').on('submit', function (e) {
        e.preventDefault();
          
        var fd = new FormData($('.form-upload')[0]);

          if (typeof img !== 'undefined'){
            fd.append('img', img, imgname);
          }
          if (typeof img1 !== 'undefined'){
            fd.append('img1', img1, imgname1);
          }
          if (typeof img2 !== 'undefined'){
            fd.append('img2', img2, imgname2);
          }
          if (typeof img3 !== 'undefined'){
            fd.append('img3', img3, imgname3);
          }
          if (typeof img4 !== 'undefined'){
            fd.append('img4', img4, imgname4);
          }
          
        if (tageErr !== true && nameErr !== true && descErr !== true && priceErr !== true && cityErr !== true && userErr !== true && mobileErr !== true && imgErr !== true) {
            $('.form-upload .submit').remove();
            $.ajax({
                url: "ajaxupload.php",
                type: "POST",
                data:  fd,
                contentType: false,
                cache: false,
                processData:false,
                success:function(response){
                    if(response != 0){
                        $(".upload").html(response);
                    }else{
                        alert('File not uploaded');
                    }
                }
            });
        } else {
            console.log('Error: true');
        }
        
    });
