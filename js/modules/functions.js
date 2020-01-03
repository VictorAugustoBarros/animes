$(document).ready(function() {
    $("#myModalEditar .btn-submit").click(function(e) {
        $(this).attr("disabled", true);
        var _frm = $(this).closest('#myModalEditar').find("form");
        $.ajax({
            type: 'POST',
            url: "routes/"+_frm.data('url'),
            data: _frm.serialize(),
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
        e.preventDefault();
    });
});

function btnAdicionar(view, idReferencia='') {
    modal = $("#myModalEditar");
    modal.modal('show');

    $.ajax({
        url: '/mvc/views/' + view + '/frm/form_' + view + '.php',
        type: 'GET',
        data: {
            'view': view,
            'idReferencia': idReferencia
        },
        success: function (html) {
            modal.find('.modal-body').html(html);
        }
    });
}

function getView(ref, div) {
    var view = ref.split("_")[1];

    jQuery.ajax({
        url: '/mvc/views/' + view + '/' + ref + '.php',
        type: "POST",
        success: function (data) {
            $("#" + div).html(data);
        }
    });
}

function createCards(data, div, view) {
    var html = '<div class="row">';
    for (var value in data) {
        html +=
            '<div class="col-sm-3 animes_card">' +
            '    <div class="card">' +
            '        <a onclick="onSubmit(' + data[value]['id'] + ', ' + div + ', \'' + view + '\')"><img class="card-img-top img_animes_card" src="' + data[value]['img'] + '"></a>' +
            '    <div class="card-body">' +
            '        <h3><strong>' + value + '</strong></h3>' +
            '        <p class="card-text">' + parseSinopse(data[value]['sinopse']) + '</p>' +
            '    </div>' +
            '    </div>' +
            '</div>'
    }

    html += '</div>';
    return html;
}

function loadManga(id, div, view) {
    jQuery.ajax({
        url: '/mvc/views/' + view + '/listar_' + view + '_x.php',
        type: "POST",
        data: {
            id: id
        },
        success: function (html) {
            $("#" + div).html(html);
        }
    });
}

function parseSinopse(text) {
    if (text.length > 170) {
        text = shorten(text, 135) + ' ...';
    }
    return text;
}

function shorten(str, maxLen, separator = ' ') {
    if (str.length <= maxLen) return str;
    return str.substr(0, str.lastIndexOf(separator, maxLen));
}