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
                        <h1 class="page-header">Market Settings - <?php echo $market['title']; ?></h1>
                        <hr class="mb-4">
                    
                        <div class="row">
                                <div class="col-xl-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmmarket" action="<?php echo site_url('admin/markets/updateSettings'); ?>" id="frmmarket" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <input type="hidden" name="id" id="id" value="<?php echo $market['id']; ?>"/>
                                                <?php $days=array("Monday","Tuesday","Wednesday","Thursday","Firday","Saturday",'Sunday'); ?>
                                                <?php for($i=1;$i<=7;$i++) { ?>
                                                <input type="hidden" name="day[]" value="<?php echo $i; ?>" />
                                                <br/>
                                                <h3><?php echo $days[$i-1]; ?></h3>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Opening Timimg</label>
                                                        <input type="time" class="form-control" name="openingtime[]" value="<?php echo $settings[$i-1]['openingtime']; ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Closing Timimg</label>
                                                        <input type="time" class="form-control" name="closingtime[]" value="<?php echo $settings[$i-1]['closingtime']; ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Status</label>
                                                        <select name="status[]" class="form-control">
                                                            <option value="1" <?php echo ($settings[$i-1]['status']==1) ? "selected" : ""; ?>>Open</option>
                                                            <option value="0" <?php echo ($settings[$i-1]['status']==0) ? "selected" : ""; ?>>Close</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Order Interval(min)</label>
                                                        <select name="slotinterval[]" class="form-control">
                                                            <option value="15" <?php echo ($settings[$i-1]['slotinterval']==15) ? "selected" : ""; ?>>15</option>
                                                            <option value="30" <?php echo ($settings[$i-1]['slotinterval']==30) ? "selected" : ""; ?>>30</option>
                                                            <option value="45" <?php echo ($settings[$i-1]['slotinterval']==45) ? "selected" : ""; ?>>45</option>
                                                            <option value="60" <?php echo ($settings[$i-1]['slotinterval']==60) ? "selected" : ""; ?>>60</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Order Limit</label>
                                                        <input type="number" class="form-control" name="slotlimit[]" value="<?php echo $settings[$i-1]['slotlimit']; ?>">
                                                    </div>
                                                    
                                                </div>
                                                <?php } ?>
                                                <div class="form-group row">
													<div class="col-sm-12">
														<button type="submit" class="btn btn-primary">Update Settings</button>
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