/*window.addEventListener("load", function(){
  var tabs = document.querySelectorAll("ul.nav-tab > li");

  for(i=0; i<tabs.length; i++){
    tabs[i].addEventListener("click", switchTab);
  }

  function switchTab(event){
    document.querySelectorAll("ul.nav-tab li.active").classList.remove("active");
    document.querySelectorAll(".tab-pane.active").classList.remove("active");
  }

});*/
jQuery(document).ready(function($){

  var tabs = $("ul.nav-tab > li");

  for(i=0; i<tabs.length; i++){
    $(tabs[i]).click(function(event){
      $("ul.nav-tab li.active").removeClass("active");
      $(".tab-pane.active").removeClass("active");

      //$(this).preventDefault();

      var anchor = event.target;
      var activePaneID = anchor.getAttribute("href");

      $(this).addClass("active");
      $(activePaneID).addClass("active");
    });
  }

});