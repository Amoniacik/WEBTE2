<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
    class Folder{

        private $files;
        private $path;
        private $cls;

        function Folder($path){
            $this->files = scandir($path);
            $this->path=$path;
        }

        public function getFiles(){

//            <a href="../images/feika.jpg" rel="lightbox-cats" title="Pohľad na fei">
//            <img src="../images/feika.jpg" height="100" width="150"/>
//        </a>
            $this->cls="folder".str_replace(".","",str_replace('/','_',$this->path));

            $res="<section class='folder".str_replace(".","",str_replace('/','_',$this->path))."' style='display:none;'>";
            //$res="<section>";
            //$res.="<h3 onclick='show(\"folder_images_demo\")'>$this->path</h3>";
            for($i=0; $i<count($this->files); $i++){
                $f=$this->path."/".$this->files[$i];

                if(substr($f, -4) == '.jpg' || substr($f, -4) == '.png' || substr($f, -4) == '.gif'){

                    $res.="<div class='image-box'><a href=\"$f\" rel=\"lightbox-cats\"><img src=\"$f\" height=\"100\" width=\"150\"/></a></div>";
                }
            }
            $res.="</section><div class='myClear'></div>";
            return $res;
        }

        public function getName(){

        }

        public function getClass(){
            return $this->cls;
        }
    }

?>