$(document).ready(function() {

    /**
     * populates the districts
     */
    $('#state').change(function() {
        var stid = $(this).val();
        $.post("",
                {
                    stid: stid,
                    submit: "populate-district"
                },
        function(data)
        {
            var response = JSON.parse(data);
            //populate district data
            $('#district').html(response.data);
        }
        );
    });
    
    /**
     * search
     */
    $('#search').click(function(){
        var did = $('#district').val();
        if(did == 0)
        {
            alert("Please select a city");
            return ;
        }
        $.post("",
                {
                    did: did,
                    submit: "search-places"
                },
        function(data)
        {
            var response = JSON.parse(data);
            //populate searched data
            $('.search-res-place').html(response.data);
        }
        );
    });
    
    /**
     * detailed map view
     */
    $(document).on("click",".full-view",function(){
        var address = $(this).data('address');
        $.post("",
                {
                    address: address,
                    submit: "map-full-view"
                },
        function(data)
        {
            var response = JSON.parse(data);
            //populate district data
            $('#map-view').html(response.data);
             $('.search-res-place').html(response.custom_data);
        }
        );
    });
    /**
     * detailed map view
     */
    $(document).on("click",".full-detailed-view",function(){
        var id = $(this).data('id');
        $.post("",
                {
                    id: id,
                    submit: "map-detailed-full-view"
                },
        function(data)
        {
            var response = JSON.parse(data);
            //populate district data
            $('#map-view').html(response.data);
             $('.search-res-place').html(response.custom_data);
        }
        );
    });
    /**
     * detailed map view
     */
    $(document).on("click",".full-detailed-search-view",function(){
        var id = $(this).data('id');
        $.post("",
                {
                    id: id,
                    submit: "map-detailed-full-view"
                },
        function(data)
        {
            var response = JSON.parse(data);
            //populate district data
            $('#map-view').html(response.data);
             $('.search-res-place').html(response.custom_data);
        }
        );
    });
    
    $(document).on("click",".search-map",function(){
        var search = $(this).data('search');
        var coordinates = $('#form-data').data('coordinates');
        var address = $('#form-data').data('search');
        var id = $('#form-data').data('id');
        $.post("",
                {
                    search:search,
                    address:address,
                    coordinates:coordinates,
                    id:id,
                    submit: "map-search"
                },
        function(data)
        {
            var response = JSON.parse(data);
            //populate district data
            $('#map-view').html(response.data);
             //$('.search-res-place').html(response.custom_data);
        }
        );
    });
    
});

