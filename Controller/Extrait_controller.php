<?php
class Extrait_controller
{
        public function extrait($x,$y){
        $extr = explode(' ', "$x",$y);
        $extr[$y-1]=" ";
        $extrait=implode(" ", $extr);
        return $extrait;
    }
}