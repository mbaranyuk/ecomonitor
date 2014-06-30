<div id="marker_info">
    <? $types = PointType::model()->getTypes(); ?>
    <h2><?= $types[$marker->type]; ?> № <?= $marker->id; ?></h2>
    <p><?= $marker->about; ?></p>
    <br>
    <p><b>Широта: </b><?= $marker->latitude; ?></p>
    <p><b>Довгота: </b><?= $marker->longitude; ?></p>
    <br>
</div>