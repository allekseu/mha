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
                    foreach (array_reverse(request_db('episode WHERE season =' . $season)) as $episode) {
                        echo '<div class="panel-episode">';
                            echo '<a target="_blank" rel="noopener noreferrer" href="https://www.crunchyroll.com/watch/' . $episode['link'] . '">';
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
            </div>

        </div>

    </div>

    <div class="main-right">
        <div class="panel" id="movie3">
            <div class="panel-header bg-red_____">
                Movie 3
                <span class="material-symbols-rounded panel-expand">expand_more</span>
            </div>
            <div class="panel-content">
            </div>
        </div>

        <div class="panel" id="movie2">
            <div class="panel-header bg-red_____">
                Movie 2
                <span class="material-symbols-rounded panel-expand">expand_more</span>
            </div>
            <div class="panel-content">
            </div>
        </div>

        <div class="panel" id="movie1">
            <div class="panel-header bg-red_____">
                Movie 1
                <span class="material-symbols-rounded panel-expand">expand_more</span>
            </div>
            <div class="panel-content">
            </div>
        </div>
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