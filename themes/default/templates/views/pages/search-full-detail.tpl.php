<section id="search-result-wrapper">
    <div class="center wow fadeInDown">
        <h2>Detailed Search Result</h2>
    </div>

    <?php if (is_array($datas) && count($datas) == 1): ?>
     <?php foreach ($datas as $data): $mapArr = (json_decode($data->data)) ?>
            <div class="col-lg-12">
                <div class=" panel panel-default full-detailed-search-view" data-id="<?= $data->id ?>">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#">
                                <?= $mapArr[0].", ".$mapArr[1] ?>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php elseif(count($datas) > 1 ): ?>
        <?php foreach ($datas as $data): $mapArr = (json_decode($data->data)) ?>
        <?php $len = count($mapArr); $mapArr[$len-1] = '' ?>
            <div class="col-lg-6">
                <div class=" panel panel-default full-detailed-view" data-id="<?= $data->id ?>">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#">
                                <?= $mapArr[0].", ".$mapArr[1] ?>
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