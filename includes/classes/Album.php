<?php

    class Album{
        private $conn;
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artWorkPath;



        public function __construct($conn, $id){
            $this->conn = $conn;
            $this->id = $id;
            $query = mysqli_query($this->conn, "SELECT * FROM albums WHERE id='$this->id'");
            $album = mysqli_fetch_array($query);

            $this->title = $album['title'];
            $this->artistId = $album['artist'];
            $this->genre = $album['genre'];
            $this->artWorkPath = $album['artworkPath'];
        }


        public function getTitle(){
            return $this->title;
        }
        public function getArtist(){
            $artist = new Artist($this->conn, $this->artistId);
            return $artist->getName();
        }
        public function getGenre(){
            return $this->genre;
        }
        public function getArtWorkPath(){
            return $this->artWorkPath;
        }

        public function getNumberSongs(){
            $query = mysqli_query($this->conn, "SELECT album FROM songs WHERE album='$this->id'");
            return mysqli_num_rows($query);
        }

        public function getSongsIds(){
            $query = mysqli_query($this->conn, "SELECT * FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
            $array = array();
            while($row = mysqli_fetch_array($query)){
                array_push($array, $row['id']);
            }
            return $array;

        }

    }


?>