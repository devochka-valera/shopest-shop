<h1> Cart </h1>
<ul>
    <?php foreach ($products as $index => $product) { ?>
        <li><?php echo $product->name ?>
            <a href="/index.php?r=cart/remove&id=<?php echo $index ?>"> Remove </a>
        </li>
    <?php } ?>
</ul>

<?php if (!empty ($products)) { ?>
    <a href="/index.php?r=cart/clear"> Clear </a>

<?php } ?>
