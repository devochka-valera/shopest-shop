<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 30.04.2016
 * Time: 22:01
 */
?>
<ul>
    <?php foreach ($categories as $category) { ?>
        <li><a href="/index.php?r=product/category&id=<?php echo $category->id ?>"><?php echo $category->name ?></a>
        </li>
    <?php } ?>
</ul>

<h1> hello </h1>
<ul>
    <?php foreach ($products as $product) { ?>
        <li><?php echo $product->name ?>
        <a href="/index.php?r=cart/add&id=<?php echo $product->id ?>"> Buy </a>
        </li>
    <?php } ?>
</ul>
