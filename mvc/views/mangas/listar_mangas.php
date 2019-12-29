<section class="site-section" id="about-section">
    <div id="mainCards" class="container">
        <br>
        <div style="text-align: center">
            <button type="button" class="btn btn-info" onclick="btnAdicionar('mangas', 'mainModal')">Cadastrard</button>
        </div>
        <div class="dynatable-demo">
            <ul id="ul-example" class="row-fluid">
                <li class="span4" data-color="gray">
                    <div class="">
                        <div class="thumbnail-image" style="text-align: center">
                            <img id="beastars" onclick="loadManga(0, 'mainCards', 'mangas')" src="/images/mangas/beastars.jpg" class="img_animes" alt=""/>
                        </div>
                    </div>
                </li>
                <li class="span4" data-color="color">
                    <div class="thumbnail">
                        <div class="thumbnail-image">
                            <img id="psycho pass" src="/images/mangas/psycho_pass.jpg" class="img_animes" alt=""/>
                        </div>
                    </div>
                </li>
                <li class="span4" data-color="gray">
                    <div class="thumbnail">
                        <div class="thumbnail-image">
                            <img id="magi" src="/images/mangas/magi.png" class="img_animes" alt=""/>
                        </div>
                    </div>
                </li>
                <li class="span4" data-color="color">
                    <div class="thumbnail">
                        <div class="thumbnail-image">
                            <img id="shingeki no kyojin" src="/images/mangas/shingeki_no_kyojin.jpg" class="img_animes" alt=""/>
                        </div>
                    </div>
                </li>
                <li class="span4" data-color="gray">
                    <div class="thumbnail">
                        <div class="thumbnail-image">
                            <img id="vinland" src="/images/mangas/vinland.jpg" class="img_animes" alt=""/>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<script>
    // Function that renders the list items from our records
    function ulWriter(rowIndex, record, columns, cellWriter) {
        var cssClass = "span4", li;
        if (rowIndex % 3 === 0) {
            cssClass += ' first';
        }
        li = '<li class="' + cssClass + '"><div style="height:490px;width: 340px"><div class="thumbnail-image">' + record.thumbnail + '</div><div class="caption"></div></div></li>';
        return li;
    }

    // Function that creates our records from the DOM when the page is loaded
    function ulReader(index, li, record) {
        var $li = $(li),
            $caption = $li.find('.caption');
        record.thumbnail = $li.find('.thumbnail-image').html();
        record.caption = $caption.html();
        record.label = $caption.find('h3').text();
        record.description = $caption.find('p').text();
        record.color = $li.data('color');
    }

    $('#ul-example').dynatable({
        table: {
            bodyRowSelector: 'li'
        },
        dataset: {
            perPageDefault: 6,
            perPageOptions: [3, 6, 12]
        },
        writers: {
            _rowWriter: ulWriter
        },
        readers: {
            _rowReader: ulReader
        },
        params: {
            records: 'mangás'
        }
    });
</script>