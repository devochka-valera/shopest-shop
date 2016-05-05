<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 30.04.2016
 * Time: 22:01
 */
?>
<div class="col-sm-3 col-md-2 sidebar">
    <div class="list-group ">
        <?php foreach ($categories as $category) { ?>
            <a class="list-group-item "
               href="/index.php?r=product/category&id=<?php echo $category->id ?>"><?php echo $category->name ?></a>

        <?php } ?>
    </div>
</div>

<div class="col-sm-9  col-md-10  main">

    <?php foreach ($products as $product) { ?>
        <div class="col-sm-6 col-md-4 ">
            <div class="thumbnail">

                <?php if ($product->productImages != null) { ?>
                    <img src="<?php echo $product->productImages[0]->url ?>">
                <?php } else { ?>
                    <img src="/assets/img/58012f10271141.560e22ecce887.jpg">
                <?php } ?>
                <div class="caption ">
                    <h3><?php echo $product->name; ?></h3>
                    <p><?php echo $product->description; ?></p>
                    <div class="btn-group " role="group " aria-label="... ">
                        <a href="/index.php?r=product/detail&id=<?php echo $product->id; ?>" class="btn btn-default ">
                            <span class="glyphicon glyphicon-search "></span>
                            О товаре</a>
                        <button type="button " class="btn btn-default "><span
                                class="glyphicon glyphicon-zoom-in"></span></button>
                        <a href="/index.php?r=cart/add&id=<?php echo $product->id; ?>" class="btn btn-default ">В
                            корзину</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
