jQuery(document).ready(function() {


    var userFeed = new Instafeed({
        get: 'user',
        userId: '<php echo $nombre_usuario ?>',
        limit: 12,
        resolution: 'thumbnail',
        accessToken: '<?php echo $access_token ?>',
        sortBy: 'most-recent',
        template: '<div class="col-lg-3 instaimg"><a href="{{image}}" title="{{caption}} <br>&#9829:{{likes}} <strong>Comentarios:</strong> {{comments}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class="img-fluid"/></a> </div>',
    });


    userFeed.run();


    // Esto creara una galeria
    jQuery('.gallery').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });




});