<!-- BEGIN #content -->
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width:100%;
        height:500px;
      }
      /* Optional: Makes the sample page fill the window. */
    </style>
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Edit Market</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmmarket" action="<?php echo site_url('admin/markets/updatemarket'); ?>" id="frmmarket" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                    <div class="col-sm-6">
                                                <input type="hidden" name="id" id="id" value="<?php echo $market['id']; ?>"/>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $market['title']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" name="location" id="location" value="<?php echo $market['location']; ?>">
                                                        <input type="hidden" class="form-control" name="lat" id="lat" value="<?php echo $market['lat']; ?>">
                                                        <input type="hidden" class="form-control" name="lng" id="lng" value="<?php echo $market['lng']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Description</label>
                                                        <textarea name="description" id="description" class="form-control"><?php echo $market['description']; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Fee(%)</label>
                                                        <input type="number" class="form-control" name="fee" id="fee" value="<?php echo $market['fee']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control" name="image" id="image">
                                                        <?php if(!empty($market['image'])) { ?>
                                                            <img class="img-responsive" width="150px" src="<?php echo base_url(); ?>uploads/markets/<?php echo $market['image']; ?>"/>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group row">
													<div class="col-sm-12">
														<button type="submit" class="btn btn-primary">Edit Market</button>
													</div>
												</div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="map"></div>
                                                </div>
                                                </div>
                                                
                                            </form>
                                        </div>                                       
                                    </div>
                                </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>
<script>
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 40.365467, lng: -97.980361},
        zoom: 5
    });

    var input = document.getElementById('location');

    var autocomplete = new google.maps.places.Autocomplete(input);
    
    autocomplete.bindTo('bounds', map);

    var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

    <?php if(!empty($market['lat']) && !empty($market['lng'])) { ?>
             map.setCenter(new google.maps.LatLng(<?php echo $market['lat']; ?>, <?php echo $market['lng']; ?>));
             marker.setPosition(new google.maps.LatLng(<?php echo $market['lat']; ?>, <?php echo $market['lng']; ?>));
            map.setZoom(17);  // Why 17? Because it looks good.
            marker.setVisible(true);
    <?php } ?>


    autocomplete.addListener('place_changed', function() {
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);

          document.getElementById('lat').value=place.geometry.location.lat();
          document.getElementById('lng').value=place.geometry.location.lng();
          marker.setVisible(true);
          
        });


}
</script>