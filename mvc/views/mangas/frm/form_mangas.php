<div class="row">
    <div class="col-sm-1 animes_card">

    </div>

    <div class="col-sm-10 animes_card" style="text-align: center;color: green">
        <form id="form_mangas" data-url="mangas/insertNewManga" method="post" data-loader="offer">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="sinopse">Sinopse</label>
                <textarea class="form-control" id="sinopse" rows="6"></textarea>
            </div>
            <div class="form-group">
                <label for="totalVolumes">Total Volumes</label>
                <input type="number" class="form-control" id="totalVolumes">
            </div>
            <div class="form-group">
                <label for="volumes" style="padding-right: 10px">Volumes</label>
                <i id="volumesTooltip" class="fas fa-info-circle" title="range ( - ), separador ( , )"></i>
                <input type="text" class="form-control" id="volumes">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <div class="col-sm-1 animes_card">

    </div>
</div>

<script>
    $(function () {
        $("#volumesTooltip").tooltip();
    });

    function submitForm(form) {
        var nome = $("#nome").val();
        var sinopse = $("#sinopse").val();
        var totalVolumes = $("#totalVolumes").val();
        var volumes = $("#volumes").val();

        var params = {
            nome: nome,
            sinopse: sinopse,
            totalVolumes: totalVolumes,
            volumes: volumes,
        };

        jQuery.ajax({
            url: '/routes/mangas/insertNewManga',
            type: "POST",
            data: {
                params: params
            },
            success: function (data) {
                alert(data);
//                if (data) {
//                    alert("Mangás adicionados com sucesso!");
//                }
            }
        });
    }
</script>

<style>
    .form-control {
        height: 40px;
    }
</style>