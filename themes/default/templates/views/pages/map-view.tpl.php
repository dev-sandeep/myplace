<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<section class="container">
    <?php if(isset($dosearch)): ?>
    <iframe
        width="100%"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAfBhKhQ8QNCAhIeJtONdW5eAiCuIC55-w
        &q=<?= $dosearch ?>">
    </iframe>
    <?php else: ?>
    <iframe
        width="100%"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAfBhKhQ8QNCAhIeJtONdW5eAiCuIC55-w
        &q=<?= $search ?>">
    </iframe>
    <?php endif; ?>
</section>
<section class="container">
    <div class="text-center">
        <button class="btn btn-default btn-xs search-map" data-search="+bus+stand" title="Bus Stand"><i class="fa fa-2x fa-bus"></i></button>
        <button class="btn btn-default btn-xs search-map" data-search="+railway+station" title="Railway Station"><i class="fa fa-2x fa-train"></i></button>
        <button class="btn btn-default btn-xs search-map" data-search="+airport" title="Airport"><i class="fa fa-2x fa-plane"></i></button>
        <button class="btn btn-default btn-xs  btn-danger full-detailed-search-view" data-id="<?= $id ?>" title="Searched Location"><i class="fa fa-2x fa-map-marker"></i></button>
        <button class="btn btn-default btn-xs search-map" data-search="+restuarant" title="Restuarant"><i class="fa fa-2x fa-cutlery"></i></button>
        <button class="btn btn-default btn-xs search-map" data-search="+atm" title="ATM"><i class="fa fa-2x fa-rupee"></i></button>
        <button class="btn btn-default btn-xs search-map" data-search="+hospital" title="Hospital"><i class="fa fa-2x fa-ambulance"></i></button>
        <br>
        
<!--        <b>Search Nearby:</b>
        <select class="form-control">
            <option>Police Station</option>
        </select>-->
    </div>
    <div id="form-data" data-id="<?= $id ?>" data-search="<?= $address ?>" data-coordinates="<?= $search ?>"></div>
</section>
