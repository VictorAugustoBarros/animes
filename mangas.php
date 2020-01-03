<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'] . "/mvc/views/header.php"); ?>

<body id="mainMangas" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/mvc/views/top_bar.php"); ?>

    <div id="mainContent">

    </div>

    <div id="myModalEditar" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-submit" id="btnCad">Salvar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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

<style>
    #mainMangas {
        background-image: url("/images/background_mangas.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .teste {
        background-color: black;
    }
</style>