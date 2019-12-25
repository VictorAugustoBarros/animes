function loadCards(view, div) {
    jQuery.ajax({
        url: '/routes/' + view + "/listCards",
        type: "POST",
        success: function () {
            var data = {
                0: [0, "Beastars", "/images/mangas/beastars.jpg", "Beastars se passa em um mundo onde animais antropomórficos, herbívoros e carnívoros convivem uns com os outros. O protagonista da história é Legosi, um lobo que faz parte do clube de drama do colégio Cherryton."],
                1: [81, "Shingeki no Kyojin", "/images/mangas/shingeki_no_kyojin.jpg", 'Há várias décadas, a humanidade foi quase exterminada pelo súbito aparecimento de seres humanoides conhecido como “titãs”, criaturas gigantescas e de inteligência aparentemente baixa, que devoram humanos por prazer.'],
                2: [22, "Vinland Saga", "/images/mangas/vinland.jpg", "Thorfinn é filho de um dos maiores guerreiros vikings, mas quando o seu pai é morto na batalha contra o mercenário Askeladd, ele jura vingança. Thorfinn se junta ao grupo de Askeladd para um dia desafiá-lo para um duelo e derrotá-lo, mas acaba se envolvendo na guerra pela coroa da Inglaterra."],
                3: [31, "Psycho Pass", "/images/mangas/psycho_pass.jpg", 'A história se passa em um futuro onde é possível medir e qualificar a personalidade e estado mental de uma pessoa instantaneamente. Essa informação é processada e gravada, e o termo “Psycho Pass” se refere ao padrão usado para medir o estado de espirito de um individuo.'],
                4: [4, "Magi", "/images/mangas/magi.png", 'Aladdin , após ficar preso no mesmo lugar durante toda a sua vida, sai em uma jornada ao lado de Ugo, um Djinn que habita dentro da flauta que ele carrega consigo, em busca de outros gênios.'],
            };

            let html = createCards(data, div);
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

function createCards(data, div) {
    let html = '';
    for (let value in data) {
        html += '<div class="col-sm-4 animes_card">' +
                '    <div class="card">' +
                '        <a href="javascript:getCardsByName('+ data[value][0] +','+ div+')"><img class="card-img-top img_animes_card" src="' + data[value][2] + '"></a>' +
                '    <div class="card-body">' +
                '        <h3><strong>' + data[value][1] + '</strong></h3>' +
                '        <p class="card-text">' + parseSinopse(data[value][3]) + '</p>' +
                '    </div>' +
                '    </div>' +
                '</div>'
    }

    html += '<script>' +
                'document.getElementsByClassName("img_animes_card").onclick = function(tete){'+
                    'alert("clicked");' +
                '};' +
            '</script>';

    return html;
}

function getCardsByName(id, div) {
    console.log("OK -> ID: " + id + " /// Div: " + div);
    $("#" + div.id).html('<h1>' + id + '</h1>');
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