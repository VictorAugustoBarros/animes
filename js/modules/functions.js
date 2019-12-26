function loadCards(view, div) {
    jQuery.ajax({
        url: '/routes/' + view + "/listCards",
        type: "POST",
        success: function () {
            var data = {
                'Beastars': {
                    id: 0,
                    img: "/images/mangas/beastars.jpg",
                    sinopse: "Beastars se passa em um mundo onde animais antropomórficos, herbívoros e carnívoros convivem uns com os outros. O protagonista da história é Legosi, um lobo que faz parte do clube de drama do colégio Cherryton."
                },
                'Vinland Saga': {
                    id: 22,
                    img: "/images/mangas/vinland.jpg",
                    sinopse: "Thorfinn é filho de um dos maiores guerreiros vikings, mas quando o seu pai é morto na batalha contra o mercenário Askeladd, ele jura vingança. Thorfinn se junta ao grupo de Askeladd para um dia desafiá-lo para um duelo e derrotá-lo, mas acaba se envolvendo na guerra pela coroa da Inglaterra."
                },
                'Psycho Pass': {
                    id: 31,
                    img: "/images/mangas/psycho_pass.jpg",
                    sinopse: "A história se passa em um futuro onde é possível medir e qualificar a personalidade e estado mental de uma pessoa instantaneamente. Essa informação é processada e gravada, e o termo “Psycho Pass” se refere ao padrão usado para medir o estado de espirito de um individuo."
                },
                'Magi': {
                    id: 4,
                    img: "/images/mangas/magi.png",
                    sinopse: "Aladdin , após ficar preso no mesmo lugar durante toda a sua vida, sai em uma jornada ao lado de Ugo, um Djinn que habita dentro da flauta que ele carrega consigo, em busca de outros gênios."
                }
            }

            var html = createCards(data, div, view);
            $("#" + div).html(html);
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

function onSubmit(id, div, view) {
    jQuery.ajax({
        url: '/mvc/views/' + view + '/listar_' + view + '_x.php',
        type: "POST",
        data: {
            id: id
        },
        success: function (html) {
            $("#" + div.id).html(html);
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