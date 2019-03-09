
$(document).ready(function () {
 $('.header_report > .col-lg-3 > a').click(function (event) {
   event.preventDefault();//stop browser to take action for clicked anchor

   //get displaying tab content jQuery selector
   var active_tab_selector = $('.header_report > .col-lg-3.active > a').attr('href');

   //find actived navigation and remove 'active' css
   var actived = $('.header_report > .col-lg-3.active');
   actived.removeClass('active');

   //add 'active' css into clicked navigation
   $(this).parents('.col-lg-3 ').addClass('active');

   //hide displaying tab content
   $(active_tab_selector).removeClass('active');
   $(active_tab_selector).addClass('hide');

   //show target tab content
   var target_tab_selector = $(this).attr('href');
   $(target_tab_selector).removeClass('hide');
   $(target_tab_selector).addClass('active');
 });

 // show img
 $(".popup button.img").click(function () {
     var $src = $(this).attr("value");
     $(".show").fadeIn();
     $(".img-show img").attr("src", $src);
  });


 $("span, .overlay").click(function () {
     $(".show").fadeOut();
  });
  //play audio
  $( "#playAudio" ).click(function() {
       $('#Audio' )[0].play();
   });

   //pause audio
  $( "#pauseAudio" ).click(function() {
     $("#Audio")[0].pause();
   });


  $(".view_files").click(function(){
    $("#files").toggle(1000);
  });
  
});
