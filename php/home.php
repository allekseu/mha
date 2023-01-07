<?php include_once('header.php'); ?>

<div class="main">

    <div class="main-left">
        <?php foreach ([6, 5, 4, 3, 2, 1] as $season) {
            
            echo '<div class="panel">';
                    
                echo '<div class="panel-header bg-blue____">';
                    echo 'Season&nbsp;' . $season;
                    echo '<span class="material-symbols-rounded panel-expand">expand_more</span>';
                echo '</div>';

                echo '<div class="panel-content">';
                    foreach (array_reverse((new dbRequestClass())->dbRequest('episode', 'WHERE season = ' . $season)) as $episode) {
                        echo '<div class="panel-episode">';
                            if (!empty($episode['link'])) {echo '<a target="_blank" rel="noopener noreferrer" href="https://www.crunchyroll.com/watch/' . $episode['link'] . '">';}
                            else {echo '<a>';}
                                echo '<div class="panel-episode-thumbnail">';
                                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . IMG_THUMB . 'ep_' . $episode['id'] . '.jpg')) {
                                        echo '<img src="' . IMG_THUMB . 'ep_' . $episode['id'] . '.jpg" />';
                                    }
                                    else {
                                        echo '<img src="' . IMG_THUMB . 'ep_none.jpg" />';
                                    }
                                    if (date_create($episode['date']) < date_create()) {
                                        echo '<div class="panel-episode-number bg-green___">';
                                            echo '#' . $episode['id'];
                                        echo '</div>';
                                    }
                                    else {
                                        echo '<div class="panel-episode-number bg-yellow__">';
                                            echo '#' . $episode['id'];
                                        echo '</div>';
                                    }
                                    if ($episode['watched'] === 1) {
                                        echo '<span class="material-symbols-rounded panel-episode-watched">check_circle</span>';
                                    }
                                    else {
                                        echo '<span class="material-symbols-rounded panel-episode-notwatched">cancel</span>';
                                    }
                                echo '</div>';
                            echo '</a>';
                            echo '<div class="panel-episode-title">';
                                echo $episode['title_en'];
                            echo '</div>';
                            echo '<div class="panel-episode-title">';
                                echo $episode['title_jp'];
                            echo '</div>';
                            echo '<div class="panel-episode-date">';
                                echo date_format(date_create($episode['date']), 'Y-m-d');
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';

            echo '</div>';
        } ?>

        <div class="panel">
                    
            <div class="panel-header bg-purple__">
                OVAs
                <span class="material-symbols-rounded panel-expand">expand_more</span>
            </div>

            <div class="panel-content">
                <?php
                    foreach (array_reverse((new dbRequestClass())->dbRequest('ova')) as $ova) {
                        echo '<div class="panel-episode">';
                            if (!empty($ova['link'])) {echo '<a target="_blank" rel="noopener noreferrer" href="https://www.crunchyroll.com/watch/' . $ova['link'] . '">';}
                                echo '<div class="panel-episode-thumbnail">';
                                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . IMG_THUMB . 'ova_' . $ova['id'] . '.jpg')) {
                                        echo '<img src="' . IMG_THUMB . 'ova_' . $ova['id'] . '.jpg" />';
                                    }
                                    else {
                                        echo '<img src="' . IMG_THUMB . 'ep_none.jpg" />';
                                    }
                                    if (date_create($ova['date']) < date_create()) {
                                        echo '<div class="panel-episode-number bg-green___">';
                                            echo 'OVA#' . $ova['id'];
                                        echo '</div>';
                                    }
                                    else {
                                        echo '<div class="panel-episode-number bg-yellow__">';
                                            echo '#' . $ova['id'];
                                        echo '</div>';
                                    }
                                    if ($ova['watched'] === 1) {
                                        echo '<span class="material-symbols-rounded panel-episode-watched">check_circle</span>';
                                    }
                                    else {
                                        echo '<span class="material-symbols-rounded panel-episode-notwatched">cancel</span>';
                                    }
                                echo '</div>';
                                if (!empty($ova['link'])) {echo '</a>';}
                            echo '<div class="panel-episode-title">';
                                echo $ova['title_en'];
                            echo '</div>';
                            echo '<div class="panel-episode-title">';
                                echo $ova['title_jp'];
                            echo '</div>';
                            echo '<div class="panel-episode-date">';
                                echo date_format(date_create($ova['date']), 'Y-m-d');
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>

        </div>

    </div>

    <div class="main-right">             
        <?php foreach ([3, 2, 1] as $number) {
            
            echo '<div class="panel">';
                    
                echo '<div class="panel-header bg-red_____">';
                    echo 'Movie&nbsp;' . $number;
                    echo '<span class="material-symbols-rounded panel-expand">expand_more</span>';
                echo '</div>';

                echo '<div class="panel-content">';
                    foreach (array_reverse((new dbRequestClass())->dbRequest('movie', 'WHERE id = ' . $number)) as $movie) {
                        echo '<div class="panel-episode">';
                            if (!empty($movie['link'])) {echo '<a target="_blank" rel="noopener noreferrer" href="https://www.crunchyroll.com/watch/' . $movie['link'] . '">';}
                                echo '<div class="panel-episode-thumbnail">';
                                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . IMG_THUMB . 'movie_' . $movie['id'] . '.jpg')) {
                                        echo '<img src="' . IMG_THUMB . 'movie_' . $movie['id'] . '.jpg" />';
                                    }
                                    else {
                                        echo '<img src="' . IMG_THUMB . 'ep_none.jpg" />';
                                    }
                                    if (date_create($movie['date']) < date_create()) {
                                        echo '<div class="panel-episode-number bg-green___">';
                                            echo 'MOVIE#' . $movie['id'];
                                        echo '</div>';
                                    }
                                    else {
                                        echo '<div class="panel-episode-number bg-yellow__">';
                                            echo '#' . $movie['id'];
                                        echo '</div>';
                                    }
                                    if ($movie['watched'] === 1) {
                                        echo '<span class="material-symbols-rounded panel-episode-watched">check_circle</span>';
                                    }
                                    else {
                                        echo '<span class="material-symbols-rounded panel-episode-notwatched">cancel</span>';
                                    }
                                echo '</div>';
                            if (!empty($movie['link'])) {echo '</a>';}
                            echo '<div class="panel-episode-title">';
                                echo $movie['title_en'];
                            echo '</div>';
                            echo '<div class="panel-episode-title">';
                                echo $movie['title_jp'];
                            echo '</div>';
                            echo '<div class="panel-episode-date">';
                                echo date_format(date_create($movie['date']), 'Y-m-d');
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';

        } ?>
    </div>

</div>

<script>
    $(".panel-content").toggle();
    $(".panel-header").click(function() {
        if ($(this).parent().find(".panel-content").is(":hidden")) {
            $(this).find(".panel-expand").text("expand_less");
            $(this).parent().find(".panel-content").slideToggle("slow");
        }
        else {
            $(this).find(".panel-expand").text("expand_more");
            $(this).parent().find(".panel-content").slideToggle("slow");
        }
    });
</script>