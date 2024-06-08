$(".show-sidebar").click(function () {
  $(".sidebar").animate({ marginLeft: 0 });
});

$(".hide-sidebar").click(function () {
  $(".sidebar").animate({ marginLeft: "-100%" });
});

function go(url) {
  setTimeout(function () {
    location.href = `${url}`;
  }, 500);
}
