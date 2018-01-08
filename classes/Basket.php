<?php

class Basket{
    public static function activeButton($sess_id){
        if(isset($_SESSION['basket'][$sess_id])){
            $id = 0;
            $label = "Remove from basket";
            $addedClass = "red";
        }else{
            $id = 1;
            $label = "Add To basket";
            $addedClass = "";
        }
        $out = "<a href=\"#\" class=\"add_to_basket {$addedClass}\" rel=\"".$sess_id."_".$id."\">{$label}</a>";
        return $out;
    }
}