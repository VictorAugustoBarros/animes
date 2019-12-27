<!DOCTYPE html>
<html>
<head>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/bootstrap-2.3.2.min.css"/>
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/dynatable-docs.css"/>
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/jquery.dynatable.css"/>
    <script type='text/javascript' src='https://s3.amazonaws.com/dynatable-docs-assets/js/jquery.dynatable.js'></script>

</head>
<body>
<h3>A Stylized List</h3>

<div class="dynatable-demo">
    <ul id="ul-example" class="row-fluid">
        <li class="span4" data-color="gray">
            <div class="thumbnail">
                <div class="thumbnail-image">
                    <img src="/images/mangas/beastars.jpg"/>
                </div>
                <div class="caption">
                    <h3>Stegosaurus armatus</h3>
                    <p>State: Colorado</p>
                    <p>Year: 1982</p>
                    <p><a target="_blank" href="http://en.wikipedia.org/wiki/Stegosaurus"
                          class="btn btn-primary">View</a> <a href="#" class="btn">Action</a></p>
                </div>
            </div>
        </li>
        <li class="span4" data-color="color">
            <div class="thumbnail">
                <div class="thumbnail-image">
                    <img src="https://s3.amazonaws.com/dynatable-docs-assets/images/dinosaurs/300px-Astrodon1DB.jpg"/>
                </div>
                <div class="caption">
                    <h3>Astrodon johnstoni</h3>
                    <p>State: Maryland</p>
                    <p>Year: 1998</p>
                    <p><a target="_blank" href="http://en.wikipedia.org/wiki/Astrodon_johnstoni"
                          class="btn btn-primary">View</a> <a href="#" class="btn">Action</a></p>
                </div>
            </div>
        </li>
        <li class="span4" data-color="gray">
            <div class="thumbnail">
                <div class="thumbnail-image">
                    <img src="https://s3.amazonaws.com/dynatable-docs-assets/images/dinosaurs/300px-Hypsibema_missouriensis_Bollinger_County_Museum_of_Natural_History.jpg"/>
                </div>
                <div class="caption">
                    <h3>Hypsibema missouriensis</h3>
                    <p>State: Missouri</p>
                    <p>Year: 2004</p>
                    <p><a target="_blank" href="http://en.wikipedia.org/wiki/Hypsibema_missouriensis"
                          class="btn btn-primary">View</a> <a href="#" class="btn">Action</a></p>
                </div>
            </div>
        </li>
        <li class="span4" data-color="color">
            <div class="thumbnail">
                <div class="thumbnail-image">
                    <img src="https://s3.amazonaws.com/dynatable-docs-assets/images/dinosaurs/Knight_hadrosaurs.jpg"/>
                </div>
                <div class="caption">
                    <h3>Hadrosaurus foulkii</h3>
                    <p>State: New Jersey</p>
                    <p>Year: 1991</p>
                    <p><a target="_blank" href="http://en.wikipedia.org/wiki/Hadrosaurus"
                          class="btn btn-primary">View</a> <a href="#" class="btn">Action</a></p>
                </div>
            </div>
        </li>
        <li class="span4" data-color="gray">
            <div class="thumbnail">
                <div class="thumbnail-image">
                    <img src="https://s3.amazonaws.com/dynatable-docs-assets/images/dinosaurs/300px-Sauroposeidon_dinosaur.svg.png"/>
                </div>
                <div class="caption">
                    <h3>Paluxysaurus jonesi</h3>
                    <p>State: Texas</p>
                    <p>Year: 2009</p>
                    <p><a target="_blank" href="http://en.wikipedia.org/wiki/Paluxysaurus"
                          class="btn btn-primary">View</a> <a href="#" class="btn">Action</a></p>
                </div>
            </div>
        </li>
        <li class="span4" data-color="color">
            <div class="thumbnail">
                <div class="thumbnail-image">
                    <img src="https://s3.amazonaws.com/dynatable-docs-assets/images/dinosaurs/300px-Triceratops_BW.jpg"/>
                </div>
                <div class="caption">
                    <h3>Triceratops</h3>
                    <p>State: Wyoming</p>
                    <p>Year: 1994</p>
                    <p><a target="_blank" href="http://en.wikipedia.org/wiki/Triceratops"
                          class="btn btn-primary">View</a> <a href="#" class="btn">Action</a></p>
                </div>
            </div>
        </li>
    </ul>
</div>

<script>
    (function () {
        // Function that renders the list items from our records
        function ulWriter(rowIndex, record, columns, cellWriter) {
            var cssClass = "span4", li;
            console.log(cssClass);
            if (rowIndex % 3 === 0) {
                cssClass += ' first';
            }
            li = '<li class="' + cssClass + '"><div class="thumbnail"><div class="thumbnail-image">' + record.thumbnail + '</div><div class="caption">' + record.caption + '</div></div></li>';
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
                perPageDefault: 3,
                perPageOptions: [3, 6]
            },
            writers: {
                _rowWriter: ulWriter
            },
            readers: {
                _rowReader: ulReader
            },
            params: {
                records: 'dinosaurs'
            }
        });
    })();
</script>
</body>
</html>
