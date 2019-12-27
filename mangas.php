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

    <div id="mainModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 450px">
            <div class="modal-content">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-header container d-block p-2">
                        <div class="row d-block">
                            <div class="col-sm-12" style="text-align: center;color: #5bb75b;">
                                <h1><b id="">Mangás</b></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</div>

<a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>
</body>
</html>

<script>
    $(document).ready(function () {
        getView('listar_mangas', 'mainContent');
    });
</script>