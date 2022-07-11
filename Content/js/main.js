$(document).ready(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop()) {
        $("header").addClass("sticky");
      } else {
        $("header").removeClass("sticky");
      }
    });
  });

  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop()) {
        $("#backtop").fadeIn();
      } else {
        $("#backtop").fadeOut();
      }
    });
    $("#backtop").click(function () {
      $("html, body").animate({ scrollTop: 0 }, 1000);
    });
  });

  function showop(e) {
    // var result = document.getElementById("result");
    // kiểm tra có class chưa 
    if (e.classList.contains("active")) {
      e.classList.remove("active");
    } else{
      e.classList.add("active");
    }
  }
