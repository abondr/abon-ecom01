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
</div>
<?php require_once '_footer.php'; ?>
