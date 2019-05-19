<div id="pricing">
    <div class="container">
        <div class="text-center">
            <h3>Products list</h3>
            <p></p>
        </div>
        <div class="pricing-area text-center">
            <div class="row">
                <?php foreach ($products as $row): ?>
                    <div class="col-md-3 plan price-one wow fadeInDown" data-wow-offset="0" data-wow-delay="0.2s">
                        <ul>
                            <li class="heading-one">
                                <h2><?php echo $row->Name; ?></h2>
                                <span>Price: <?php echo $row->Price; ?> INR</span>
                            </li>
                            <li><img src="<?php echo base_url("public/products/".$row->image); ?>" class="img-responsive" alt=""></li>
                            <li class="plan-action"><a href="" class="btn btn-primary">Buy now</a></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

