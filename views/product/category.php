
<h1> category <?php  echo $category->name; ?></h1>
<ul>
<?php foreach ($category->products as $product) { ?>
    <li><?php echo $product->name?></li>
<?php } ?>
</ul>
