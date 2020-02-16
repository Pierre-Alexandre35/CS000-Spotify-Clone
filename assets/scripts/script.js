var audioElement;
var currentPlaylist = [];
var mouseDown = false;



function formatTime(seconds){
    var time = Math.round(seconds);
    var minutes = Math.floor(time / 60);
    var seconds = time - (minutes * 60);

    var extraZero;

    if(seconds < 10){
        extraZero = "0";
    } else {
        extraZero = "";
    }

    return minutes + ":" + extraZero + seconds;

}

function updateTimeProgressBar(audio){
    $(".progress-time.current").text(formatTime(audio.currentTime));
    $(".progress-time.remaining").text(formatTime(audio.duration - audio.currentTime));

    var progress = (audio.currentTime / audio.duration) * 100;

    $(".playback-bar .progress").css("width", progress + "%");


}

function updateVolumeProgressBar(audio){
    var volume = audio.volume * 100;

    $(".volume-bar .progress").css("width", volume + "%");
}

function Audio(){
    this.currentPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("canplay", function(){
        $(".progress-time.remaining").text(formatTime(this.duration));
        console.log(this.duration);
    });

    this.audio.addEventListener("timeupdate", function(){
        if(this.duration){
            updateTimeProgressBar(this);
        }
    });

    this.audio.addEventListener("volumechange", function(){
        updateVolumeProgressBar(this);
    });

    this.setTrack = function(track){
        this.currentPlaying = track;
        this.audio.src = track.path;
    }
    this.play = function(){
        this.audio.play();
    }

    this.pause = function(){
        this.audio.pause();
    }

    this.setTime = function(seconds){
        this.audio.currentTime = seconds;
    }
}
