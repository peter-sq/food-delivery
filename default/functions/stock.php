<?php
include("./config/config.php");
$GLOBALS['Conn'];
include("https://www.relishapp.ng/beta/config/functions.php");

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
                elseif($format == "js_popup_alert"){ ?>
                    <script>alert("<?php echo strtoupper($type); ?> | <?php echo $string; ?>");</script>
                <?php }
    return false;
}

function getData($table, $index_field, $index_field_value, $order_subject, $sort_order, $output_result_field) {
    $query = mysqli_query($GLOBALS["Conn"], "SELECT * FROM ".$table." WHERE ".$index_field." = '".$index_field_value."' ORDER BY ".$order_subject." ".$sort_order) or die(mysqli_error($GLOBALS["Conn"]));
    
    if(mysqli_num_rows($query) >= 1){
        #fetch data
        if(mysqli_num_rows($query) == 1){
            while($data = mysqli_fetch_array($query)){
                return $data["$output_result_field"];
            }
        }
            else{
                while($data = mysqli_fetch_array($query)){
                    return $data["$output_result_field"]."*";
                }
            }
    }
        else{
            message("This user doesn't exist at the moment", "warning", "boostrap_alert");
        }
}

function storeKpi($storeID) {
    #define empty array
    $sales_cost = array();

    #get product ID
    $productID = getData("products", "author", $storeID, "ID", "ASC", "ID");
    $productID_arr = explode("*", $productID);
   #echo count(explode("*", $productID));
   #print_r();
   if(count(explode("*", $productID)) >= 1 && !empty($productID_arr[1])) {
    #get order time stamp by product id
    $order_time_stamp = getData("orders", "product", $productID, "ID", "ASC", "time_stamp");

    #convert list of timestamps to array
    $order_time_stamp_array = explode("*", $order_time_stamp);
        //print_r($order_time_stamp_array);
    foreach($order_time_stamp_array as $OTS){
        #convert single time stamp to array, delimited by WHIE_SPACE
        $OTS_split = explode(" ", $OTS);

            // print_r($OTS_split);

        #define date and time into variable
        $order_date = $OTS_split[0];
        $order_time = $OTS_split[1];

        #extract order year from $order_date
        $order_year = explode("-", $order_date);

        #tell what year we are
        if(date('y') == $order_year){
            $order_staus = getData("orders", "product", $productID, "ID", "ASC", "satus");

            #convert list of status to array
            $order_status_array = explode("*", $order_status);

            if(in_array("DELIVERED", $order_status_array)) {
                $costs = explode("*", getData("orders", "product", $productID, "ID", "ASC", "cost"));

                foreach($costs as $item_cost){
                    array_push($sales_cost, $item_cost);
                }

                #sum items in $sales_cost array
                $gross_sale = array_sum($sales_cost);

                return $gross_sale;
            }
                else{
                    #noting for now
                }
        }
            else{
                #do nothing
            }
    }
   }
    else{
        #go straight
        #get order time stamp by product id
        $order_time_stamp = strtok(getData("orders", "product", $productID_arr[0], "ID", "ASC", "time_stamp"), "*");
        #convert list of timestamps to array
        $order_time_stamp_array = explode("*", $order_time_stamp);
        //print_r($order_time_stamp_array);
        foreach($order_time_stamp_array as $OTS){
            #convert single time stamp to array, delimited by WHIE_SPACE
            $OTS_split = explode(" ", $OTS);

                //print_r($OTS_split);

            #define date and time into variable
            $order_date = $OTS_split[0];
            $order_time = $OTS_split[1];

            #extract order year from $order_date
            $order_year = explode("-", $order_date);

           // echo $order_year[0];
            #tell what year we are
            if("20".date('y') == $order_year[0]){
                $order_status = getData("orders", "product", $productID_arr[0], "ID", "ASC", "status");

                #convert list of status to array
                $order_status_array = explode("*", $order_status);

                //print_r($order_status_array);

                if(in_array("DELIVERED", $order_status_array)) {
                    $costs = explode("*", getData("orders", "product", $productID_arr[0], "ID", "ASC", "cost"));

                    foreach($costs as $item_cost){
                        array_push($sales_cost, $item_cost);
                    }
                    
                    //print_r($sales_cost);
                    #sum items in $sales_cost array
                    $gross_sale = array_sum($sales_cost);

                    return $gross_sale;
                }
                    else{
                        #noting for now
                        //echo "HEY";
                    }
            }
                else{
                    #do nothing
                }
        }
    }
}

echo storeKpi(1);

function totalSales($storeID){
    $gross_sale = $this->storeKpi();
    if($gross_sale){
         #define empty array
      $sales_cost = array();
      if(in_array("DELIVERED", $order_status_array)) {
        $qty = explode("*", getData("orders", "product", $productID, "ID", "ASC", "quantity"));

        foreach($qty as $qtys){
            array_push($sale_cost, $qtys);
        }

        #sum items in $total_sales array
        $total_sale = array_sum($total_sale);
        $total_sales = $total_sale * $gross_sale;

        return $total_sales;
    }
        else{
            #echo('')
        }
}

    }
    echo totalSales(1);


     



            
       
?>
