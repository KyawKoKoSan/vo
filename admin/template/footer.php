</div>
</div>
</section>

<!--  Start  Linking JS files and libraries-->

<script src="<?php echo $url; ?>/../assets/vendor/jQuery/jquery.min.js"></script>
<script src="<?php echo $url; ?>/../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/../assets/vendor/datatables.net-dt/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/adminassets/js/admin.js"></script>


<!--  End  Linking JS files and libraries-->

<script>
// start coding for minimize maximize button
$(".full-screen-btn").click(function() {
    $current = $(".full-screen-btn").closest(".card");
    $current.toggleClass("full-screen-card");
    if ($current.hasClass('full-screen-card')) {
        $(this).html(`<i class="feather-minimize-2"></i>`);
    } else {
        $(this).html(` <i class="feather-maximize-2"></i>`);
    }
});
// end coding for minimize maximize button


let currentPage = location.href;
$(".menu-item-link").each(function() {
    let link = $(this).attr("href");
    if (currentPage == link) {
        $(this).addClass('active');
    }
});
</script>

</body>

</html>