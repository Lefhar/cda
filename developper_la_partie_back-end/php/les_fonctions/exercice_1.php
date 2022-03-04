<?php
/**
 * @param string $lien http://domaine.com
 * @param string $string nom du lien
 * @return void
 */
function lien(string $lien, string $string){
    if(!empty($lien)&&!empty($string)){
        return '<a href="'.$lien.'">'.$string.'</a>';
    }
}