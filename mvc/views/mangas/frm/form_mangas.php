<div class="row">
    <div class="col-sm-1 animes_card">

    </div>

    <div class="col-sm-10 animes_card" style="text-align: center;color: green">
        <form id="form_mangas" data-url="mangas/insertNewManga" method="post" data-loader="mangas">
            <div>
                <label for="nome">Nome</label><br>
                <input style="display: inline-block" class="form-control" id="nome" name="nome" value="Beastars"/>
            </div>
            <br>

            <div>
                <label for="sinopse">Sinopse</label><br>
                <textarea class="form-control" id="sinopse" name="sinopse" rows="6">Beastars se passa em um mundo onde animais antropomórficos, herbívoros e carnívoros convivem uns com os outros. O protagonista da história é Legosi, um lobo que faz parte do clube de drama do colégio Cherryton</textarea>
            </div>
            <br>

            <div>
                <label for="totalVolumes">Total Volumes</label>
                <input type="number" class="form-control" id="totalVolumes" name="totalVolumes" value="5">
            </div>
            <br>
            <div>
                <label for="volumes" style="padding-right: 10px">Volumes</label>
                <i id="volumesTooltip" class="fas fa-info-circle" title="range ( - ), separador ( , )"></i>
                <input type="text" onkeyup="validateVar(this)" class="form-control" id="volumes" name="volumes" value="1, 2, 3">
            </div>
        </form>

    </div>

    <div class="col-sm-1 animes_card">

    </div>
</div>

<script>
    $(function () {
        $("#volumesTooltip").tooltip();
    });

    function validateVar(field) {
        try {
            var variaveis = field.value;
            if (!variaveis) {
                $('#volumes').css('border-color', 'red');
                $("#btnCad").attr("disabled", true);
                return false;
            }

            var dadosVar = variaveis.split(",")
            for (var i = 0; i < dadosVar.length; i++) {
                if (isNaN(dadosVar[i])) {
                    $('#volumes').css('border-color', 'red');
                    $("#btnCad").attr("disabled", true);
                    return false;

                }
            }
            $('#volumes').css('border-color', 'green');
            $('#btnCad').attr("disabled", false);

        }
        catch (error) {
            $('#volumes').css('border-color', 'red');
            $("#btnCad").attr("disabled", true);
            return false;
        }
    }

</script>

<style>
    .form-control {
        height: 40px;
    }
</style>