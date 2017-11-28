<?php

class Basket{
    public static function activeButton($sess_id){
        if(isset($_SESSION['basket'][$sess_id])){
            $id = 0;
            $label = "Remove From Basket";
        }else{
            $id = 1;
            $label = "Add To Basket";
        }
        $class = $id==0?"red":"";
        $out = "<a href='#' rel='".$sess_id."_".$id."' class='add_to_basket ".$class."'>$label</a>";
        
        return $out;
    }
}