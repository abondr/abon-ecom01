<?php

$cat_id = Url::getParam('category'); //category id
$rows = [];
if (empty($cat_id)) {
    require_once 'error.php';
} else {
    $objCatalogue = new Catalogue();
    $categoryObj = $objCatalogue->getCategory($cat_id);
    if (empty($categoryObj)) {
        require_once 'error.php';
    } else {
        $products = $objCatalogue->getProducts($cat_id);
        echo count($products);
        $objPaging = new Paging($products, 5);
        $rows = $objPaging->getRecords(5);
    }
}
//instantiate paging class

require_once '_header.php';
echo "<h1>Catalogue := {$categoryObj['name']}</h1>";
if (!empty($rows)) {
    foreach ($rows as $product) {
        echo "<div class='catalogue_wrapper'>";
        echo "<div class='catalogue_wrapper_left'>";
        $image = !empty($product['image']) ? $objCatalogue->_path . $product['image'] : $objCatalogue->_path . "unavailable.png";
        $width = Helper::getImageSize($image, 0);
        $width = $width > 120 ? 120 : $width;
        echo "<a href=\"/?page=catalogue-item&amp;category={$categoryObj['id']}&amp;" .
        "id={$product['id']}\"><img src=\"{$image}\" alt=\"" .
        Helper::encodeHTML($product['name'], 2) . "\" width=\"{$width}\"></a>";
        echo"</div>";
        echo "<div class='catalogue_wrapper_right'>";
        echo "<h3>{$product['name']}</h3>";
        echo "<h2>Price : = {$objCatalogue::$_currency} " . number_format($product['price'], 2) . "</h2>";
        echo "<h4>" . Helper::shortenString(Helper::encodeHTML($product['description'])) . "</h4>";
        echo "<div>" . Basket::activeButton($product['id']) . "</div>";
        echo"</div>";
        echo"</div>";
    }
    echo $objPaging->getPaging();
}else{
    echo "<p>There is no products in the category</p>";
}

require_once '_footer.php';
?>


