<?php
    //include("db.php");
    include("../config/config.php");
	function message($string, $type, $format) {
        if($format == "plain"){
            echo strip_tags($string);
        }
            elseif($format == "bootstrap_alert"){ ?>
                <p class="alert alert-<?php echo $type; ?>"><?php echo $string; ?></p>
            <?php }
                elseif($format == "json"){
                    echo '{
                        message : '.$string.',
                        type : '.$type.'   
                    }';
                }
        return false;
    }
    
    
    function iconfy($string){
        if($string == strtolower("Online")){ ?>
            <i class="fa fa-circle text-success"></i>
        <?php }
            elseif($string == strtolower("Offline")){ ?>
                <i class="fa fa-circle text-danger"></i>
            <?php }
                elseif($string == strtolower("Active")){ ?>
                    <i class="fa fa-check text-success"></i>
                <?php }
                    elseif($string == strtolower("Pending")){ ?>
                        <i class="fa fa-refresh text-warning"></i>
                    <?php }
        return false;
    }

    function database_query($table, $command, $query, $primary_key_fields, $primary_key_field_values, $record_field_index, $sort, $order, $output){
        include("db.php");

        if($command == "SELECT"){
            if($sort == true){
                $primary_key_fields_dataset = explode(",", $primary_key_fields);
                $primary_key_field_values_dataset = explode(",", $primary_key_field_values);

                //If there is just one record reference
                if($count($primary_key_fields_dataset == 1) && $count($primary_key_field_values_dataset == 1)){
                    $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM ".$table." WHERE ".$primary_key_fields_dataset[0]." = ".$primary_key_field_values_dataset[0]." ".$order) or die(mysqli_error($GLOBALS["Conn"]));
                    //check if record exists
                    if(mysqli_num_rows($query) >= 1){
                        //if record exists, should I output record?
                        if($output == true)/*If I am told to output record */{
                            //check if there is any particular field to index
                            if($record_field_index == null) /* If no index field was specified */{
                                //Fetch Data in JSON Format
                            }
                                else /* If an index field was specified */{
                                    //Fetch Field Values in array and output in a while loop
                                    while($data = mysqli_fetch_array($query)){
                                        //capture data in a capsule
                                        $capsule = array($data["$record_field_index"].",");
                                        return $capsule;
                                    }
                                }
                        }
                            else/* If I am told not to*/{
                                return true;
                            }
                    }
                        else{
                            message("No Data Found", "warning", "plain");
                        }
                }
                    elseif($count($primary_key_fields_dataset == 2) && $count($primary_key_field_values_dataset == 2)) /* If there are two record refernces */{
                        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM ".$table." WHERE ".$primary_key_fields_dataset[0]." = ".$primary_key_field_values_dataset[0]." && ".$primary_key_fields_dataset[1]." = ".$primary_key_field_values_dataset[1]." ".$order) or die(mysqli_error($GLOBALS["Conn"]));
                        //check if record exists
                        if(mysqli_num_rows($query) >= 1){
                            //if record exists, should I output record?
                            if($output == true)/*If I am told to output record */{
                                //check if there is any particular field to index
                                if($record_field_index == null) /* If no index field was specified */{
                                    //Fetch Data in JSON Format
                                }
                                    else /* If an index field was specified */{
                                        //Fetch Field Values in array and output in a while loop
                                        while($data = mysqli_fetch_array($query)){
                                            //capture data in a capsule
                                            $capsule = array($data["$record_field_index"].",");
                                            return $capsule;
                                        }
                                    }
                            }
                                else/* If I am told not to*/{
                                    return true;
                                }
                        }
                            else{
                                message("No Data Found", "warning", "plain");
                            }
                    }
                        else/*If no record references were specified*/{
                            message("CODE ERROR -  Record reference wasn't specified", "danger", "plain");
                        }
            }
                else{
                    $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM ".$table." WHERE") or die(mysqli_error($GLOBALS["Conn"]));
                }
        }
            elseif($command == "UPDATE"){
                $query = mysqli_query($GLOBALS["Conn"], "") or die(mysqli_error($GLOBALS["Conn"]));
            }
                elseif($command == "DELETE"){
                    $query = mysqli_query($GLOBALS["Conn"], "") or die(mysqli_error($GLOBALS["Conn"]));
                }
                    elseif($command == "INSERT"){
                        $query = mysqli_query($GLOBALS["Conn"], "") or die(mysqli_error($GLOBALS["Conn"]));
                    }

    }
    
    function record_first_timer($ip_address){
    	//get list of first timers and convert to array
    	$first_timers = explode(",", file_get_contents("firstTimers.txt"));
    	
    	//Check if current visitor is in the list
    	if/*if visitor is in the list*/(in_array($ip_address, $first_timers)){
    		//Go to gateway ?>
    		<script>
    		    var current_screen0 = $("#current_screen[name='current_screen']").val();;
    		    if(current_screen0 == "home.html"){
    		        
    		    }
    		        else{
    		            //alert(current_screen0);
    		            window.location.href="home.html";
    		        }
    		 </script>
    	<?php }
    		else/*if visitor is not in the list*/{
    			//Add visitor to the list
    			file_put_contents("firstTimers.txt", $ip_address.",");
    			
    			//show onboard screen ?>
    			<script>window.location.href="onboard_screen0.html";</script>
    		<?php }
    		return false;
    }
    
    function is_login() {
    	
    	if/*if the specified session exists*/(!isset($_SESSION["emailAddress"])){
    		return "no";
    	}
    		else/*if the specified session doesn't exists*/{
    		    return "yes";
    		}
    }
    
    function my_current_location($gps_cords) {
        $json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$gps_cords.'&key=AIzaSyDpWJIUeIcP_GAPCOcuHqwrRUwnO1HHQKE');
        $data = json_decode($json, true);
        
        return str_replace(", Lagos, Nigeria", "", $data["results"][0]["formatted_address"]);
        /*foreach($data as $value){
            if(is_array($value["results"])){
                return "Hey";
            }
                else{
                    return "Not";
                }
        }*/
    }
    
    function get_banners() {
        //include("db.php");
        
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM banners") or die(mysqli_error($GLOBALS["Conn"]));
        if(mysqli_num_rows($query) >= 1){
            while($banner = mysqli_fetch_array($query)){ ?>
                <div>
                  <img src="assets/images/<?php echo $banner["image"]; ?>"  style="width:314px; height:auto; margin:auto;" onclick="window.location.href='<?php echo $banner["link"]; ?>';">
                </div>
            <?php }
        }
            else{ echo "none"; }
        return false;
    }
    
    function get_featured_categories($type, $sort_order, $limit, $output_format) {
         //include("db.php");
         if($type == 'null' || $type == ""){
             $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM categories WHERE isFeatured = 1 ORDER BY ID ".$sort_order. " LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
         
             if(mysqli_num_rows($query) >= 1){
                while($category = mysqli_fetch_array($query)){
                    if($output_format == "flex"){ ?>
                        <div class="p-2 align-self-center" onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
                            <div style="width: 70px; height:70px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div>
                            <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
                            <!--<img src="assets/images/<?php //echo $category["featureImage"]; ?>" class="img-rounded" style="width:66px; height:auto;" />-->
                        </div>
                <?php }
                    elseif($output_format == "owl_carousel") { ?>
    		          <div class="item" style="width: auto; text-align:center; font-weight: 700; line-height: 0.8;" onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
    		              <!--<img src="Mask_cf.png" srcset="Mask_cf.png 1x, Mask_cf@2x.png 2x" style="width:150px; height:auto; margin:auto;">-->
    		              <div style="width: 103px; height:103px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div><br />
    		              <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
    		          </div>
                    <?php }
                }
             }
                else{
                    //Show Demo Data ?>
                    <div class="p-2 bg-info align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
                        <img src="assets/images/pizza.jpg" class="img-rounded w-5" />
                    </div>
        			<div class="p-2 bg-warning align-self-center">
        			    <img src="assets/images/rice.jpg" class="img-rounded w-5" />
        			</div>
        			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
        			    <img src="assets/images/ice_cream.jpg" class="img-rounded w-5" />
        			</div>
        			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
        			    <img src="assets/images/drinks.jpg" class="img-rounded w-5" />
        			</div>
                <?php }
         }
             else{
                 $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM categories WHERE type='".$type."' && isFeatured = 1 ORDER BY ID ".$sort_order. " LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
         
                 if(mysqli_num_rows($query) >= 1){
                    while($category = mysqli_fetch_array($query)){
                        if($output_format == "flex"){ ?>
                            <div class="p-2 align-self-center" onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
                                <div style="width: 70px; height:70px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div>
                                <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
                                <!--<img src="assets/images/<?php //echo $category["featureImage"]; ?>" class="img-rounded" style="width:66px; height:auto;" />-->
                            </div>
                    <?php }
                        elseif($output_format == "owl_carousel") { ?>
        		          <div  onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
        		              <div style="width: 103px; height:103px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div><br />
        		              <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
        		          </div>
                        <?php }
                    }
                 }
                    else{
                        //Show Demo Data ?>
                        <div class="p-2 bg-info align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
                            <img src="assets/images/pizza.jpg" class="img-rounded w-5" />
                        </div>
            			<div class="p-2 bg-warning align-self-center">
            			    <img src="assets/images/rice.jpg" class="img-rounded w-5" />
            			</div>
            			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
            			    <img src="assets/images/ice_cream.jpg" class="img-rounded w-5" />
            			</div>
            			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
            			    <img src="assets/images/drinks.jpg" class="img-rounded w-5" />
            			</div>
                    <?php }
             }
    }
    
    function get_featured_restaurants($category, $sort_order, $limit){
        //include("db.php");
        
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM stores WHERE category = '".$category."' && is_featured = 1 ORDER BY ID ".$sort_order." LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
        if(mysqli_num_rows($query) >= 1){
            while($restaurant = mysqli_fetch_array($query)){ ?>
                <div class="card" onclick="window.location.href='stores.html?category=<?php echo $restaurant["category"]; ?>&store_id=<?php echo $restaurant["ID"]; ?>';">
                    <div class="media" style="padding-top:2px !important; padding-bottom: 2px !important;">
                      <img src="assets/images/<?php echo $restaurant["logo"]; ?>" class="align-self-center mr-3" style="width:76pt; border-radius: 100px;">
                      <div class="media-body" style="text-align:left;">
                        <span style="font-size: 15pt;"><?php echo $restaurant["title"]; ?></span>
                        <p style="font-size:13px; color: #B1B1B1;"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $restaurant["store_address"]; ?></p>
                        <div style="display: inline; font-size: 12pt; color: #B1B1B1;">
                            <span class="text-black fw-5"><i class="fa fa-star text-warning"></i>&nbsp;<?php echo $restaurant["star_rating"]; ?></span>,
                            <span class="text-black fw-2"><?php echo $restaurant["reviews"]; ?> Reviews</span>
                        </div>
                      </div>
                    </div>
                </div>
            <?php }
        }
            else{
                message("No Data Found", "warning", "bootstrap_alert");
            }
        return false;
    }
    
    function get_featured_sub_categories($type, $sort_order, $limit, $output_format, $parent_id) {
         //include("db.php");
         if($type == 'null' || $type == ""){
             $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM categories WHERE isFeatured = 1 && parent = '".$parent_id."' ORDER BY ID ".$sort_order. " LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
         
             if(mysqli_num_rows($query) >= 1){
                while($category = mysqli_fetch_array($query)){
                    if($output_format == "flex"){ ?>
                        <div class="p-2 align-self-center" onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
                            <div style="width: 70px; height:70px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div>
                            <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
                            <!--<img src="assets/images/<?php //echo $category["featureImage"]; ?>" class="img-rounded" style="width:66px; height:auto;" />-->
                        </div>
                <?php }
                    elseif($output_format == "owl_carousel") { ?>
    		          <div class="item" style="width: auto; text-align:center; font-weight: 700; line-height: 0.8;" onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
    		              <!--<img src="Mask_cf.png" srcset="Mask_cf.png 1x, Mask_cf@2x.png 2x" style="width:150px; height:auto; margin:auto;">-->
    		              <div style="width: 103px; height:103px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div><br />
    		              <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
    		          </div>
                    <?php }
                }
             }
                else{
                    //Show Demo Data ?>
                    <div class="p-2 bg-info align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
                        <img src="assets/images/pizza.jpg" class="img-rounded w-5" />
                    </div>
        			<div class="p-2 bg-warning align-self-center">
        			    <img src="assets/images/rice.jpg" class="img-rounded w-5" />
        			</div>
        			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
        			    <img src="assets/images/ice_cream.jpg" class="img-rounded w-5" />
        			</div>
        			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
        			    <img src="assets/images/drinks.jpg" class="img-rounded w-5" />
        			</div>
                <?php }
         }
             else{
                 $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM categories WHERE type='".$type."' && isFeatured = 1 && parent = '".$parent_id."'  ORDER BY ID ".$sort_order. " LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
         
                 if(mysqli_num_rows($query) >= 1){
                    while($category = mysqli_fetch_array($query)){
                        if($output_format == "flex"){ ?>
                            <div class="p-2 align-self-center" onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';" style="line-height:1;">
                                <div style="width: 70px; height:70px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 100px; margin: auto;"></div><br/>
                                <p style="font-size: 3vw; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
                                <!--<img src="assets/images/<?php //echo $category["featureImage"]; ?>" class="img-rounded" style="width:66px; height:auto;" />-->
                            </div>
                    <?php }
                        elseif($output_format == "owl_carousel") { ?>
        		          <div  onclick="window.location.href='categories.html?title=<?php echo $category["title"]; ?>&type=<?php echo $category["type"]; ?>';">
        		              <div style="width: 103px; height:103px; background-image: url(assets/images/<?php echo $category["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div><br />
        		              <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $category["title"]; ?></p>
        		          </div>
                        <?php }
                    }
                 }
                    else{
                        //Show Demo Data ?>
                        <div class="p-2 bg-info align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
                            <img src="assets/images/pizza.jpg" class="img-rounded w-5" />
                        </div>
            			<div class="p-2 bg-warning align-self-center">
            			    <img src="assets/images/rice.jpg" class="img-rounded w-5" />
            			</div>
            			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
            			    <img src="assets/images/ice_cream.jpg" class="img-rounded w-5" />
            			</div>
            			<div class="p-2 bg-primary align-self-center" onclick="window.location.href='categories.html?title=Pizza&type=<?php echo $type; ?>';">
            			    <img src="assets/images/drinks.jpg" class="img-rounded w-5" />
            			</div>
                    <?php }
             }
    }
    
    function get_featured_deals($sort_order, $limit){
        //include("db.php");
        
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM voucher WHERE isFeatured = 1 ORDER BY ID ".$sort_order." LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query) >= 1){
            while($deal = mysqli_fetch_array($query)){ ?>
                <div class="p-2 align-self-center" onclick="window.location.href='deals.html?title=<?php echo $deal["title"]; ?>';">
                    <div style="width: 150px; height:150px; background-image: url(assets/images/<?php echo $deal["featureImage"]; ?>); background-size:cover; background-repeat: no-repeat; background-position:center; border-radius: 20px;"></div>
                    <p style="font-size: 14px; font-weight: 500; text-align: center;"><?php echo $deal["title"]; ?></p>
                    <!--<img src="assets/images/<?php //echo $category["featureImage"]; ?>" class="img-rounded" style="width:66px; height:auto;" />-->
                </div>
    <?php }
        }
            else{ ?>
                <p class="alert alert-warning">No Data Found</p>
            <?php }
        return false;
    }
    
    function get_suggested_foodies($sort_order, $limit){
        //include("db.php");
        
        //Foodie Levels
        $foodieLevels = array("Starter Foodie", "Enthusiast Foodie", "Expert Foodie", "Senior Foodie");
        
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM users WHERE status = 'Active' && role = 'customer' ORDER BY ID LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
        if(mysqli_num_rows($query) >= 1){
            while($userData = mysqli_fetch_array($query)){
                //truncate Address
                $location = explode(", ", $userData["location"]);
                    
                if($userData["presence"] == "Online" && in_array($userData["membership_level"], $foodieLevels)){ ?>
                    <div class="card" style="width:98pt; line-height: 0.5;">
                      <img class="card-img-top p-auto" src="assets/images/<?php echo $userData["avartar"]; ?>" alt="<?php echo $userData["username"]. " Profile Picture - Relish"; ?>" style="width: 55pt; height: auto; border-radius: 100%; margin:auto;" onclick="window.location.href='user_profile.html?uID=<?php echo $userData["ID"]; ?>&get_user_data';"><br/>
                      <div class="card-body m-auto">
                        <p class="card-title text-center" style="font-size:12pt;"><?php echo $userData["username"]; ?></p>
                        <p class="card-text text-center" style="font-size: 8pt; color: #707070;">Foodie in <?php echo $location[1]; ?></p>
                        <span class="btn btn-follow" onclick="window.location.href='user_profile.html?uID=<?php echo $userData["ID"]; ?>&get_user_data';">Follow</span>
                      </div>
                    </div>
                <?php }
            }
        }
            else{
                //No Data Found
                echo "No Data Found";
            }
        return false;
    }
    
    function get_top_foodies_list($foodieLevels, $sort_order, $limit){
        //Foodie Levels
        $foodieLevels_array = explode(", ", $foodieLevels);
        
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM users WHERE status = 'Active' && role = 'customer' ORDER BY ID LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
        if(mysqli_num_rows($query) >= 1){
            while($userData = mysqli_fetch_array($query)){
                //truncate Address
                $location = explode(", ", $userData["location"]);
                    
                if($userData["presence"] == "Online" && in_array($userData["membership_level"], $foodieLevels_array)){ ?>
                    <div class="card" style="border: none; background: none; line-height:0.5;">
                        <div class="card-img-top" style="width: 47pt; height: 47pt; background-image: url(assets/images/<?php echo $userData["avartar"]; ?>); background-size: cover; background-repeat: no-repeat; background-position: center; margin; auto;"></div>&nbsp;<sup><?php echo iconfy($userData["presence"]); ?><i class="fa fa-circle text-success"></i></sup><br/>
                        <div class="card-body">
                          <p class="card-title text-left" style="font-size: 7pt; color:#000000; opacity: 0.75;">@<?php echo $userData["username"]; ?></p>
                          <a href="user_profile.html?uID=<?php echo $userData["ID"]; ?>&get_user_data" class="stretched-link"></a>
                        </div>
                    </div>
                    <!--<div class="card" style="width:98pt; line-height: 0.5;">
                      <img class="card-img-top p-auto" src="assets/images/<?php echo $userData["avartar"]; ?>" alt="<?php echo $userData["username"]. " Profile Picture - Relish"; ?>" style="width: 55pt; height: auto; border-radius: 100%; margin:auto;" onclick="window.location.href='user_profile.html?uID=<?php echo $userData["ID"]; ?>&get_user_data';"><br/>
                      <div class="card-body m-auto">
                        <p class="card-title text-center" style="font-size:12pt;"><?php echo $userData["username"]; ?></p>
                        <p class="card-text text-center" style="font-size: 8pt; color: #707070;">Foodie in <?php echo $location[1]; ?></p>
                        <span class="btn btn-follow" onclick="window.location.href='user_profile.html?uID=<?php echo $userData["ID"]; ?>&get_user_data';">Follow</span>
                      </div>
                    </div>-->
                <?php }
                    else{
                        //echo "No Data Found";
                    }
            }
        }
            else{
                //No Data Found
                echo "No Data Found";
            }
        return false;
    }
    
    function login($emailAddress, $password, $callback_url) {
        $query0 = mysqli_query($GLOBALS["Conn"], "SELECT * FROM `users` WHERE `emailAddress` = '".$emailAddress."' && password = '".sha1($password)."'") or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query0) >= 1){
            echo message("Login Successful", "success", "bootstrap_alert");
            
            //Store Session
            //$_SESSION["emailAddress"] = $emailAddress; ?>
            <script>
                setTimeout(function() {window.location.href='<?php echo $callback_url; ?>';}, 3000);
            </script>
            <?php
        }
            else{
                echo message("email address or password is incorrect", "warning", "bootstrap_alert"); ?>
                <script>
                    setTimeout(function() {window.location.href='<?php echo $callback_url; ?>';}, 3000);
                </script>
            <?php }
        return false;
    }
    
    function signup($emailAddress, $callback_url, $fields, $field_values){
        #validate email address
        if(filter_var($emailAddress, FILTER_SANITIZE_EMAIL)){
            #check if user exists
            $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM users WHERE emailAddress = ".$emailAddress) or die(mysqli_error($GLOBALS["Conn"]));
            if(mysqli_num_rows($query) >= 1){
                message("This user already exist. Kindly signup with another email address or Login to continue.", "warning", "boostrap_alert");
            }
                else{
                    #check if $fields list items count up to $field_values list items
                    #convert both lsits to array
                    $fields_array = explode(",", $fields);
                    $field_values_array = explode(",", $field_values);
                    
                    if(count($fields_array) == count($field_values_array)){
                        #proceed to signup
                        $query = mysqli_query($GLOBALS["Conn"], "INSEERT INTO users (".$fields.") VALUES ($field_values)") or die(mysqli_error($GLOBALS["Conn"]));
                        
                        if($query){
                            #output successmessage
                            message("Rigisteration Successful. A verification mail was sent to <strong>".$emailAddress."</strong>; please check to verify your email address", "success", "boostrap_alert");
                            
                            #Store Session Data
                            $_SESSION["emailAddress"] = $emailAddress; ?>
                            <script>
                                setTimeout(function() {window.location.href='<?php echo $callback_url; ?>';}, 3000);
                            </script>
                        <?php }
                            else{
                                #output error message
                                message("There was an error while registering you on our platform. Kindly contact support for further assistance.", "danger", "boostrap_alert");
                            }
                    }
                        else{
                            #output error message
                            message("There was an error while registering you on our platform. Kindly contact support for further assistance. ERROR CODE - COUNT DATA MISMATCH@SIGNUP", "danger", "boostrap_alert");
                        }
                }
        }
            else{
                message($emailAddress." is not a valid email address. Please check if you made any typos.", "danger", "boostrap_alert");
            }
        return false;
    }
    
    /*function getUserData($index_field, $index_field_value, $order_subject, $sort_order, $output_result_field) {
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM users WHERE ".$index_field." = ".$index_field_value." ORDER BY ".$order_subject." ".$sort_order) or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query) >= 1){
            #fetch data
            while($userData = mysqli_fetch_array($query)){
                return $userData["$output_result_field"];
            }
        }
            else{
                message("This user doesn't exist at the moment", "warning", "boostrap_alert");
            }
    }
    
    function getProductData($index_field, $index_field_value, $order_subject, $sort_order, $output_result_field) {
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM products WHERE ".$index_field." = ".$index_field_value." ORDER BY ".$order_subject." ".$sort_order) or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query) >= 1){
            #fetch data
            while($userData = mysqli_fetch_array($query)){
                return $userData["$output_result_field"];
            }
        }
            else{
                message("This user doesn't exist at the moment", "warning", "boostrap_alert");
            }
    }
    
    function getStorData($index_field, $index_field_value, $order_subject, $sort_order, $output_result_field) {
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM stores WHERE ".$index_field." = ".$index_field_value." ORDER BY ".$order_subject." ".$sort_order) or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query) >= 1){
            #fetch data
            while($userData = mysqli_fetch_array($query)){
                return $userData["$output_result_field"];
            }
        }
            else{
                message("This user doesn't exist at the moment", "warning", "boostrap_alert");
            }
    }*/
    
    function getData($table, $index_field, $index_field_value, $order_subject, $sort_order, $output_result_field) {
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM ".$table." WHERE ".$index_field." = '".$index_field_value."' ORDER BY ".$order_subject." ".$sort_order) or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query) >= 1){
            #fetch data
            while($data = mysqli_fetch_array($query)){
                return $data["$output_result_field"];
            }
        }
            else{
                message("This user doesn't exist at the moment", "warning", "boostrap_alert");
            }
    }
    
    function push_to_array($array, $element, $threshold){
        #check if $array has exceeded its limit
        
        if(count($array) > $threshold){
            message("Threshold Limit reached for array", "warning", "plain");
        }
            else{
                #push
                array_push($array, $element);
            }
        return false;
    }
    
    function insert_data_to_db($table, $callback_url, $fields, $field_values, $success_massage, $error_message){
        #check if $fields list items count up to $field_values list items
        #convert both lsits to array
        $fields_array = explode(",", $fields);
        $field_values_array = explode(",", $field_values);
        
        if(count($fields_array) == count($field_values_array)){
            #proceed
            $query = mysqli_query($GLOBALS["Conn"], "INSEERT INTO users (".$fields.") VALUES ($field_values)") or die(mysqli_error($GLOBALS["Conn"]));
            
            if($query){
                #output success message
                message($success_message, "success", "boostrap_alert");
                ?>
                <script>
                    setTimeout(function() {window.location.href='<?php echo $callback_url; ?>';}, 3000);
                </script>
            <?php }
                else{
                    #output error message
                    message($error_message, "danger", "boostrap_alert");
                }
        }
            else{
                #output error message
                message("There was an error while registering you on our platform. Kindly contact support for further assistance. ERROR CODE - COUNT DATA MISMATCH@SIGNUP", "danger", "boostrap_alert");
            }
        return false;
    }
    
    function engage($action, $review_id, $user_id){
        #Allow User to Engage
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM reviews WHERE ID = '".$review_id."'") or die(mysqli_error($GLOBALS["Conn"]));
        
        if(mysqli_num_rows($query) >= 1){
            #get field with array data
            while($review = mysqli_fetch_array($query)){
                #check action
                if($action == "like"){
                    #like review
                    $likes = $review["likes"];
                    
                    #all userid to list
                    $new_likes = $review["likes"].",".$user_id;
                    
                    #update reviews table
                    $query = mysqli_query($GLOBALS["Conn"], "UPDATE reviews SET likes = '".$new_likes."' WHERE ID='".$review_id."'") or die(mysqli_error($GLOBALS["Conn"]));
                    if($query){
                        return true;
                    }
                        else{
                            return false;
                        }
                }
                    elseif($action == "comment"){}
                        elseif($action == "share"){}
                            elseif($action == "order"){}
            }
        }
            else{
                message("Feed doesn't exist. ERROR CODE - FEED NOT AVAIL", "danger", "bootstrap_alert");
            }
        return false;
    }
    
    function fetch_feeds(){
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM reviews") or die(mysqli_error($GLOBALS["Conn"]));
        if(mysqli_num_rows($query) >= 1){
            while($review = mysqli_fetch_array($query)){
                if($review["image"] == "null"){
                   #show text type review
                   echo "Text Review<br/>";
                }
                    else{
                        #show image type review ?>
                        <div class="card" style="width:100%;" id="review<?php echo $review["ID"]; ?>">
                          <img class="card-img-top review_image" src="assets/images/<?php echo $review["image"]; ?>" alt="Card image">
                          <div class="card-img-overlay">
                                <div class="d-flex text-white feed_author">
                                  <div class="p-2">
                                     <img src="assets/images/<?php echo getData("users", "ID", $review["author"], "ID", "ASC", "avartar"); ?>" class="feed_avartar" />
                                  </div>
                                  <div class="p-2">
                                      <span class="card-title text-white feed_author_name"><?php echo getData("users", "ID", $review["author"], "ID", "ASC", "fullName"); ?><br/><span class=" text-white feed_credit">reviewed <?php echo getData("stores", "ID", $review["credit"], "ID", "ASC", "title"); ?></span></span>
                                  </div>
                                </div>
                                
                                <ul class="nav flex-column text-white engagement">
                                    <li class="nav-item engagement_item" id="like_btn<?php echo $review["ID"]; ?>">
                                        <?php
                                            if(is_login() == "yes"){
                                                #check if users has liked review before
                                                //convert list of likes to array
                                                $like_list = explode(",", $review["likes"]);
                                                if(in_array(getData("users", "emailAddress", $_SESSION["emailAddress"], "ID", "ASC", "ID"), $like_list)){
                                                    #show red heart ?>
                                                    <span class="fa fa-heart engagement_icon text-danger"></span><br/>
                                                    <span class="engagement_count"></span>
                                                <?php }
                                                    else{ ?>
                                                        <span class="fa fa-heart engagement_icon" id="like_icon<?php echo $review["ID"]; ?>"></span><br/>
                                                        <span class="engagement_count"></span>
                                                    <?php }
                                            }
                                                else{
                                                    #show null heart ?>
                                                    <span class="fa fa-heart engagement_icon" id="like_icon<?php echo $review["ID"]; ?>"></span><br/>
                                                    <span class="engagement_count"></span>
                                                <?php }
                                        ?>
                                      
                                    </li>
                                    <li class="nav-item engagement_item" data-toggle="modal" data-target="#comment_area<?php echo $review["ID"]; ?>" id="comment_btn<?php echo $review["ID"]; ?>">
                                      <span class="fa fa-comment engagement_icon" id="comment_icon<?php echo $review["ID"]; ?>"></span><br/>
                                      <span class="engagement_count"></span>
                                    </li>
                                    <li class="nav-item engagement_item" id="share_btn<?php echo $review["ID"]; ?>">
                                      <span class="fa fa-reply engagement_icon" id="share_icon<?php echo $review["ID"]; ?>"></span><br/>
                                      <span class="engagement_count"></span>
                                    </li>
                                    <li class="nav-item engagement_item" id="order_btn<?php echo $review["ID"]; ?>">
                                      <span class="fa fa-cart-plus engagement_icon" id="share_icon<?php echo $review["ID"]; ?>"></span><br/>
                                      <span class="engagement_count"></span>
                                    </li>
                                </ul>
                            <p class="card-text feed_text text-white">
                                <span style="font-size: 9px;"><i class=" fa fa-star"></i><i class=" fa fa-star"></i><i class=" fa fa-star"></i><i class=" fa fa-star"></i><i class=" fa fa-star-half-alt"></i>&nbsp;<?php echo $review["rating"]; ?></span><br/>
                                <span style="font-size:9px;"><?php echo substr($review["comments"], 0, 100); ?> <strong>see more</strong></span>
                            </p>
                          </div>
                        </div>
                        <!-- Comment Area -->
                        <div class="modal" id="comment_area<?php echo $review["ID"]; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h6 class="modal-title">Comments</h6>
                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body comment_process" id="comment_process<?php echo $review["ID"]; ?>">
                                    <?php
                                        #convert comment lists to array
                                        $comments = explode("***", $review["feedback"]);
                                        $sorted_comments = rsort($comments);
                                        
                                        #check if comments are available for review
                                        if(count($comments) >= 1) {
                                            #show comments
                                            foreach($comments as $comment){
                                                $single_comment = explode("~", $comment); ?>
                                                <div class="d-flex">
                                                  <div class="p-2">
                                                      <div style="width: 50px; height: 50px; background-image: url(assets/images/<?php echo getData("users", "ID", $single_comment[0], "ID", "ASC", "avartar"); ?>); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                                                  </div>
                                                  <div class="p-2 flex-grow-1"><?php echo $single_comment[1]; ?></div>
                                                </div><hr/>
                                            <?php }
                                        }
                                            else{
                                                #output warning message
                                                message("No Comment Found", "warning", "bootstrap_alert");
                                            }
                                    ?>
                                    <hr/>
                                    <div class="input-group mb-3">
                                      <input type="text" class="comment_input form-control" name="comment_input" placeholder="Type comment here" id="comment_input<?php echo $review["ID"]; ?>" />
                                      <div class="input-group-append">
                                        <span class="btn comment_submit_btn" id="submit_comment_btn<?php echo $review["ID"]; ?>"><i class="fa fa-send"></i></span>
                                      </div>
                                    </div>
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        <!-- Comment Area End -->
                        <script>
                            $(document).ready(function() {
                                /* like review */
                                $("#like_btn<?php echo $review["ID"]; ?>").click(function() {
                                    //alert("like_btn<?php //echo $review["ID"]; ?>");
                                    $("#like_btn<?php echo $review["ID"]; ?>").html(`
                                        <div class="spinner-border text-danger engage"></div>
                                    `);
                                    
                                    //alert("<?php echo $review["ID"]; ?>");
                                    $("#like_btn<?php echo $review["ID"]; ?>").load("config/actions.php?action=like&review_id=<?php echo $review["ID"]; ?>&user_id=<?php echo $review["author"]; ?>&engage");
                                });
                                /* like review end */
                                
                                /*Comment on Review */
                                $("#submit_comment_btn<?php echo $review["ID"]; ?>").click(function() {
                                    var comment = $("#comment_input<?php echo $review["ID"]; ?>[name='comment_input']").val();
                                    var newString0 = comment.replace(/ /g, "-");
                                    
                                    $("#submit_comment_btn<?php echo $review["ID"]; ?>").html(`
                                        <div class="spinner-border text-danger"></div>
                                    `);
                                    $("#comment_process<?php echo $review["ID"]; ?>").load("config/actions.php?comment="+newString0+"&reviewID=<?php echo $review["ID"]; ?>&post_comment");
                                });
                                /*Comment on Review End */
                            });
                        </script>
                    <?php }
            }
        }
            else{
                message("No Data Found", "warning", "bootstrap_alert");
            }
        return false;
    }
    
    function post_comment($comment, $review_id){
        #check if user is logedin
        if(is_login() == "yes"){
            #get comments from database
            $comments = getData("reviews", "ID", $review_id, "ID", "ASC", "feedback");
            #get user ID
            $user_id = getData("users", "emailAddress", $_SESSION["emailAddress"], "ID", "ASC", "ID");
            $new_comment = $user_id."~".$comment;
            
            #add to comment list
            $new_comments = $new_comment."***".$comments;
            
            #update review table
            $query = mysqli_query($GLOBALS["Conn"], "UPDATE reviews SET feedback = '".$new_comments."' WHERE ID = '".$review_id."'") or die(mysqli_error($GLOBALS["Conn"]));
            if($query){
                return true;
            }
                else{
                    #output error message
                    message("There was an error posting your comment", "danger", "bootstrap_alert");
                    return false;
                }
        }
            else{};
    }

    function stockApi(){
    

    }

    function get_payment($category, $sort_order, $limit){
        //include("db.php");
        
        $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM stores WHERE category = '".$category."' && is_featured = 1 ORDER BY ID ".$sort_order." LIMIT ".$limit) or die(mysqli_error($GLOBALS["Conn"]));
        if(mysqli_num_rows($query) >= 1){
            while($restaurant = mysqli_fetch_array($query)){ ?>
                <div class="card" onclick="window.location.href='stores.html?category=<?php echo $restaurant["category"]; ?>&store_id=<?php echo $restaurant["ID"]; ?>';">
                    <div class="media" style="padding-top:2px !important; padding-bottom: 2px !important;">
                      <img src="assets/images/<?php echo $restaurant["logo"]; ?>" class="align-self-center mr-3" style="width:76pt; border-radius: 100px;">
                      <div class="media-body" style="text-align:left;">
                        <span style="font-size: 15pt;"><?php echo $restaurant["title"]; ?></span>
                        <p style="font-size:13px; color: #B1B1B1;"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $restaurant["store_address"]; ?></p>
                        <div style="display: inline; font-size: 12pt; color: #B1B1B1;">
                            <span class="text-black fw-5"><i class="fa fa-star text-warning"></i>&nbsp;<?php echo $restaurant["star_rating"]; ?></span>,
                            <span class="text-black fw-2"><?php echo $restaurant["reviews"]; ?> Reviews</span>
                        </div>
                      </div>
                    </div>
                </div>
            <?php }
        }
            else{
                message("No Data Found", "warning", "bootstrap_alert");
            }
        return false;
    }

?>