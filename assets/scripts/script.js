var currentPlaylist = array();
var audioElement;

function Audio(){
    this.currentPlaying;
    this.audio = document.createElement('audio');
    this.setTrack = function(src){
        this.audio.src = src;
    }
}

console.log("hello")