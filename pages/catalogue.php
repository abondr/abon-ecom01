<?php require_once '_header.php'; ?>
<?php
$categoryId = Url::getParam("category");
if(empty($categoryId)){
    require_once("error.php");
}else{
    $objCatelogue = new Catalogue();
    $category = $objCatelogue->getCategory($categoryId);
    if(empty($category)){
        require_once("error.php");
    }else{
        $rows = $objCatelogue->getProducts($categoryId);
    }
}
?>
<div >
    <h2>Category. <?=$category['name']?></h2>
    <?php
    if(!empty($rows)){
        foreach ($rows as $row){
            $image = !empty($row['image']) ? Catalogue::getImgPath().$row['image']:Catalogue::getImgPath()."noImage.jpeg";
            $width = Helper::getImgSize($image,0);
            $width = $width > 120 ? 120 : $width;
            echo "<div class='catalogue_wrapper'>"
            ."<div class='catalogue_wrapper_left'>"
            ."<a href = '/?page=catalogue-item&amp;category=".$category['id']."&amp;id=".$row['id']."'>"
            ."<img src='".$image."' alt='".Helper::encodeHTML($row['name'],1)."'>"
            ."</a>"
            ."</div>"
            ."<div class='catalogue_wrapper_right'>"
            ."<h4>"
            ."<a href = '/?page=catalogue-item&amp;category=".$category['id']."&amp;id=".$row['id']."'>"
            .Helper::encodeHTML($row['name'],1)
            ."</a>"
            ."</h4>"
            ."<h4>Price: ".Catalogue::getCurrency().number_format($row['price'],2)."</h4>"
            ."<p>".Helper::encodeHTML($row['description'])."</p>"
            ."<p>".Basket::activeButton($row['id'])."</p>"
            ."</div>"
            ."</div>";
        }
    }else{
            echo "<div class='catalogue_wrapper'>"
            ."<div class='catalogue_wrapper_right'>"
            ."<h3>There are no products in this Category</h3>"
            ."</div>"
            ."</div>";
        }
    ?>
</div>
<?php require_once '_footer.php'; ?>
