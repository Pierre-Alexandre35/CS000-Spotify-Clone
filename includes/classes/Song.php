<?php

    class Song{
        private $conn;
        private $id;
        private $title;
        private $artist;
        private $album;
        private $genre;
        private $duration;
        private $path;
        private $albumOrder;
        private $plays;

        private $song;

    public function __construct($conn, $id){
        $this->conn = $conn;
        $this->id = $id;
        $query = mysqli_query($this->conn, "SELECT * FROM songs WHERE id='$this->id'");
        $this->song = mysqli_fetch_array($query);

        $this->title = $this->song['title'];
        $this->artist = $this->song['artist'];
        $this->album = $this->song['album'];
        $this->genre = $this->song['genre'];
        $this->duration = $this->song['duration'];
        $this->albumOrder = $this->song['albumOrder'];
        $this->plays = $this->song['plays'];
    }
    public function getTitle(){
        return $this->title;
    }
    public function getArtist(){
        return new Artist($this->conn, $this->artist);
    }
    public function getAlbum(){
        return new Album($this->conn, $this->artist);
    }
    public function getGenre(){
        return $this->genre;
    }
    public function getDuration(){
        return $this->duration;
    }
    public function getPath(){
        return $this->path;
    }
}
?>