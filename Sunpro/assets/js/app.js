jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    var e = jQuery(window).scrollTop();
    jQuery("header").height();
    e > 50
      ? jQuery("header").addClass("scrolled")
      : jQuery("header").removeClass("scrolled");
  });
  jQuery(".home_banner .slider").slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
  const select = document.querySelectorAll(".selectBtn");
  const option = document.querySelectorAll(".option");
  let index = 1;

  select.forEach((a) => {
    a.addEventListener("click", (b) => {
      const next = b.target.nextElementSibling;
      next.classList.toggle("toggle");
      // next.style.zIndex = index++;
    });
  });
  option.forEach((a) => {
    a.addEventListener("click", (b) => {
      b.target.parentElement.classList.remove("toggle");

      const parent = b.target.closest(".select").children[0];
      parent.setAttribute("data-type", b.target.getAttribute("data-type"));
      parent.innerText = b.target.innerText;
    });
  });
  function openNav() {
    document.getElementById("mySidenav").style.marginLeft = "100px";
  }
  if (jQuery(window).width() < 991) {
    function closeNav() {
      document.getElementById("mySidenav").style.marginLeft = "-90vw";
    }
  } else {
    function closeNav() {
      document.getElementById("mySidenav").style.marginLeft = "-70vw";
    }
  }
  $(document).mouseup(function (e) {
    var t = $("#mySidenav");
    t.is(e.target) || 0 !== t.has(e.target).length || closeNav();
  });
});
