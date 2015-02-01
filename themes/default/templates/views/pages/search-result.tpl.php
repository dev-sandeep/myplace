<section id="search-result-wrapper">
    <div class="center wow fadeInDown">
        <h2>Search Result</h2>
    </div>
    <?php if (is_array($datas) && count($datas) == 1): ?>
     <?php foreach ($datas as $data): ?>
            <div class="col-lg-12">
                <div class=" panel panel-default full-view" data-id="<?= $data->id ?>" data-address="<?= isset($custom_address)?$custom_address:$data->address ?>">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#">
                                <?= $data->address ?>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php elseif(count($datas) > 1 && count($datas) < 10): ?>
        <?php foreach ($datas as $data): ?>
            <div class="col-lg-6">
                <div class=" panel panel-default full-view" data-address="<?= $data->address ?>">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#">
                                <?php if(trim($data->address == ''))
                                {
                                    echo "No Result";
                                }else
                                {
                                    echo $data->address;
                                }
                                ?>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php elseif(count($datas) > 10): ?>
    <?php foreach ($datas as $data): ?>
            <div class="col-lg-4">
                <div class=" panel panel-default full-view" data-address="<?= $data->address ?>">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#">
                                <?= $data->address ?>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-lg-12">
            <div class=" panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#">
                            No Result Found
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    <?php endif; ?>

</section>