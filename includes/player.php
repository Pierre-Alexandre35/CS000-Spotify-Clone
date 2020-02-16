<?php
    $songQuery = mysqli_query($conn, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

    $resultArray = array();

    while($row = mysqli_fetch_array($songQuery)){
        array_push($resultArray, $row['id']);
    }

    $jsonArray = json_encode($resultArray);
    ?>

    <script>


        $(document).ready(function(){
            currentPlaylist = <?php echo $jsonArray ?>;
            audioElement = new Audio();
            setTrack(currentPlaylist[0], currentPlaylist, false)

            $("#now-playing-bar-container").on("mousedown touchstart mousemove touchmove", function(e){
                e.preventDefault();
            });


            

            $(".playback-bar .progress-bar").mousedown(function(){
                mouseDown = true;
            });

            $(".playback-bar .progress-bar").mousemove(function(e){
                if(mouseDown == true){
                    timeFromOffset(e, this);
                }
            });

            $(".playback-bar .progress-bar").mouseup(function(e){
                    timeFromOffset(e, this);
            });

            $(".volume-bar .progress-bar").mousedown(function(){
                mouseDown = true;
            });

            $(".volume-bar .progress-bar").mousemove(function(e){
                if(mouseDown == true){
                    var percentage = e.offsetX / $(this).width();
                    if(percentage >= 0 && percentage <= 1){
                        audioElement.audio.volume = percentage;
                    }                
                }
            });

            $(".volume-bar .progress-bar").mouseup(function(e){
                var percentage = e.offsetX / $(this).width();
                    if(percentage >= 0 && percentage <= 1){
                        audioElement.audio.volume = percentage;
                    }
            });


            $(document).mouseup(function(){
                mousedown = false;
            })
        });

        function timeFromOffset(mouse, progressbar){
            var percentage = mouse.offsetX / $(progressbar).width() * 100;
            var seconds = audioElement.audio.duration * (percentage / 100);
            audioElement.setTime(seconds);
        }

        function setTrack(trackId, newPlaylist, play){
            // First parameter: url of the ajax
            // Second (optional): data to send as JSON
            // Last(optional): what to do with the result
            $.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function(data){
                var track = JSON.parse(data);
                $(".track-name span").text(track.title)

                $.post("includes/handlers/ajax/getArtistJson.php", {artistId : track.artist}, function(data){
                    var artist = JSON.parse(data);
                    $(".artist-name span").text(artist.name);
                });

                $.post("includes/handlers/ajax/getAlbumJson.php", {albumId : track.album}, function(data){
                    var album_artwork = JSON.parse(data);
                    console.log(album_artwork);
                    $(".album-link img").attr("src", album_artwork.artworkPath);
                });

                audioElement.setTrack(track);

            });
        }

        function playSong(){

            if(audioElement.audio.currentTime == 0){
                $.post("includes/handlers/ajax/updatePlays.php", {
                    songId: audioElement.currentPlaying.id
                });
            }
            audioElement.play();
            document.querySelector(".pause").style.display="inline-block";
            document.querySelector(".play").style.display="none";

        }

        function pauseSong(){
            audioElement.pause();
            document.querySelector(".play").style.display="inline-block";
            document.querySelector(".pause").style.display="none";
        }
    </script>




        <div id="now-playing-bar-container">
            <div id="now-playing-bar">
                <div id="now-playing-left">
                    <div class="content">
                        <span class="album-link">
                            <img class="album-img" src="https://via.placeholder.com/150/a0a0a0/808080" alt="">
                        </span>
                        <div class="track-info">
                            <span class="track-name">
                                <span>Happy Birthday</span>
                            </span>
                            <span class="artist-name">
                                <span>Tom Le Noir</span>
                            </span>

                        </div>
                    </div>
                </div>
                <div id="now-playing-center">
                    <div class="content player-control">
                        <div class="buttons">
                            <button class="control-button shuffle">
                                <img src="./assets/images/icons/shuffle.png" alt="shuffle">
                            </button>
                            <button class="control-button previous">
                                <img src="./assets/images/icons/previous.png" alt="previous">
                            </button>
                            <button class="control-button play">
                                <img src="./assets/images/icons/play.png" alt="play" 
                                onclick="playSong()">
                            </button>
                            <button class="control-button pause">
                                <img src="./assets/images/icons/pause.png" alt="pause" onclick="pauseSong()">
                            </button>
                            <button class="control-button next">
                                <img src="./assets/images/icons/next.png" alt="next">
                            </button>
                            <button class="control-button repeat">
                                <img src="./assets/images/icons/repeat.png" alt="repeat">
                            </button>

                        </div>
                        <div class="playback-bar">
                            <span class="progress-time current">0.00</span>
                            <div class="progress-bar">
                                <div class="progress-bar-background">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progress-time remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div id="now-playing-right">
                    <div class="volume-bar">
                        <button class="control-button volume" title="volume button">
                            <img src="./assets/images/icons/volume.png" alt="volume">
                        </button>
                        <div class="progress-bar">
                            <div class="progress-bar-background">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>