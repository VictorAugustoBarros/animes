<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'] . "/mvc/views/header.php"); ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/mvc/views/top_bar.php"); ?>

    <div id="mainContent">

    </div>

</div>

<a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>
</body>
</html>

<script>
    $(document).ready(function () {
        getView('form_mangas', 'mainContent');
    });
</script>