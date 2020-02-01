<?php include("includes/header.php")?>
    <?php if(isset($_GET['id'])){
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

    $album = new Album($conn, $albumId);
    
    ?>


    <div class="entity-info">
        <div class="left-section">
            <img src="<?php echo $album->getArtWorkPath()?>" alt="">
        </div>
        <div class="right-section">
            <h2><?php echo $album->getTitle()?></h2>
            <p>By <?php echo $album->getArtist()?></p>
            <p><?php echo $album->getNumberSongs()?> songs</p>
        </div>
    </div>

    <div class="track-list-container">
        <ul class="track-list">
            <?php 
                $songIdArray = $album->getSongsIds();
                if(is_array($songIdArray)){
                    $i = 1;
                    foreach($songIdArray as $songId){
                        $albumSong = new Song($conn, $songId);
                        $albumArtist = $albumSong->getArtist();
                        echo "
                        <li class='track-list-row'>
                            <div class='track-count'>
                            <img class='play' src='assets/images/icons/play-white.png'>
                                <span class='track-number'>$i</span>
                            </div>
                            <div class='track-infos'>
                                <span class='track-name'>" . $albumSong->getTitle() . "</span>
                                <span class='artist-name'>" . $albumArtist->getName() . "</span>
                            </div>
                            <div class='track-options'>
                                <img class='option-button' src='assets/images/icons/more.png'>
                            </div>
                            <div class='track-duration'>
                                <span class='duration'>". $albumSong->getDuration()."</span>
                            </div>
                        </li>";
                        $i++;
                    }
                }
            ?>
        </ul>
    </div>

<?php include("includes/footer.php")?>
