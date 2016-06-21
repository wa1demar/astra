<?php get_header(); ?>

<script>
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

    $(document).ready(function () {

        var currentOffice = $('ul.offices li').first();
        currentOffice.addClass('current');

        reloadMedia(currentOffice);
        reloadMap(currentOffice.data('address'));

        $(document).on('click', '.office', function () {
            reloadMedia($(this));
        });

    });

    function reloadMedia(currentEl) {
        $('.office').removeClass('current');
        currentEl.addClass('current');

        var id = currentEl.data('id');
        jQuery.get(
            ajaxurl,
            {
                'action': 'cleanlinks_ajax_get_office_info',
                'id':  id
            },
            function(response){
                var json = jQuery.parseJSON(response);

                console.log(json);
                $(".entry-title").html(currentEl.data('type') + " в " + json.address_type + " <span class='current-city' >" + json.city + "</span>");
                $(".office-address").html(json.short_address);
                $(".phones").html(json.phone);
                $(".emails").html(json.mail);
                $(".schedule-mon").html(json.schedule_mon);
                $(".schedule-sat").html(json.schedule_sat);
                $(".schedule-sun").html(json.schedule_sun);
                $('span.current-city').html(json.city);
                $('.description').html(json.description);

                reloadMap(json.address);
            });


    }

    function reloadMap(address) {
        console.log(address);

        var gmaps = new GMaps({
            div: '#map',
            lat: 48.624240,
            lng: 22.295772
        });

        GMaps.geocode({
            address: "Украина, Закарпатская обл., " + address,
            callback: function (results, status) {
                if (status == 'OK') {
                    var latlng = results[0].geometry.location;

                    gmaps.setCenter(latlng.lat(), latlng.lng());
                    gmaps.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng(),
                        icon: '/wp-content/themes/astradia/assets/images/marker.png'
                    });
                }
            }
        });
    }
</script>
    <div id="content" class="site-content container <?php echo codilight_lite_sidebar_position(); ?>">
        <div class="content-inside">
            <div id="primary" class="content-area">
                <div id="main" class="site-main offices-main" role="main">
                    <header class="entry-header">
                        <h1 class="entry-title">Лабораторія</h1>
                    </header>
                    <h3>
                        <a class="office-address"></a>
                    </h3>
                    <div class="map-container" style="overflow: hidden;">
                        <div class="map-description">
                            <div class="phones"></div>
                            <div class="emails"></div>
                            <div class="schedule">
                                <table cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>Пн - Пт: </td>
                                        <td class="schedule-mon"></td>
                                    </tr>
                                    <tr>
                                        <td>Cб     : </td>
                                        <td class="schedule-sat"></td>
                                    </tr>
                                    <tr >
                                        <td>Нд     : </td>
                                        <td class="schedule-sun"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="map"></div>
                    </div>
                    <br />
                    <p class="description"></p>
                </div>
            </div>

            <div id="secondary" class="widget-area sidebar" role="complementary">
                <h3>Лабораторії</h3>
                <ul class="offices">
                    <ul>
                        <?php
                        $post_by_cat = get_posts(
                            array(
                                'posts_per_page' => -1,
                                'post_type' => 'offices',
                                'meta_query' => array(
                                    array(
                                        'key' => 'meta-office-type',
                                        'value' => 'meta-office-type-1',
                                        'compare' => '=',
                                    )
                                )
                            )
                        );
                        ?>
                        <?php foreach ($post_by_cat as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <li class="office " style="cursor: pointer"
                                data-type="Лабораторія"
                                data-id="<?php echo $post->ID ?>">
                                <?php echo get_the_title() ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                </ul>

                <h3>Відокремлене відділення</h3>

                <ul class="offices">
                    <ul>
                        <?php
                        $post_by_cat = get_posts(
                            array(
                                'posts_per_page' => -1,
                                'post_type' => 'offices',
                                'meta_query' => array(
                                    array(
                                        'key' => 'meta-office-type',
                                        'value' => 'meta-office-type-0',
                                        'compare' => '=',
                                    )
                                )
                            )
                        );
                        ?>
                        <?php foreach ($post_by_cat as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <li class="office " style="cursor: pointer"
                                data-type="Відокремлене відділення"
                                data-id="<?php echo $post->ID ?>">
                                <?php echo get_the_title() ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                </ul>
            </div><!-- #secondary -->
<?php get_footer(); ?>