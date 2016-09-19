<?php
    class MetaArticle {
        private $id, $title;
        public function MetaArticle($id,$title) {
            $this->id = $id;
            $this->title = $title;
        }

        public function getId() {return $this->id};
        public function getTitle() {return $this->title;}
    }

    $meta = new MetaArticle(7,"Dummy");

    echo "Id:".$meta->getId().",Title:".$meta->getTitle();
?>