<script src="../libs/jquery-3.7.1.min.js"></script>
<script>
    $('.liga-funcional').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.location.replace(href);
    });
</script>
