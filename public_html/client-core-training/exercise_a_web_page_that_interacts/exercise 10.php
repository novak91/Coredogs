<html>
    <head>
        <title>Exercise 10</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- CSS -->
        <style type="text/css">
            h1{
                background-color: #990000;
                color: white;
            }
            h2{
                color: #990000;
            }
            body{
                background-color: FFCC66;
                font-family: Verdana, sans-serif;
            }
            p{
                font-size: 14;
            }
            #policy_click{
                cursor: pointer;
            }
            #policy{
                font-size: small;
            }
            h3{
                color: green;
            }
            .error{
                color: red;
            }
            .date{
                font-family: Helvetica;
            }
        </style>
        <!-- Javascript -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                //Create is string function
                function form_input_is_string(input){
                    return typeof(input)=='string' && isNaN(input);
                }
                //Create function to find out if a variable contains a numeric value,
                //regardless of its type (e.g. it could be a String containing a numeric value)
                function isNumber(n) {
                    return !isNaN(parseFloat(n)) && isFinite(n);
                }
                $("#input_product").focus();
                $("#policy").hide();
                $("#policy_click").click(function(){
                    $("#policy").toggle('medium');
                })
                $("#output").hide();
                $("#estimate").click(function(){
                    //Take product name
                    var product = $("#input_product").val();
                    //Take cost unit
                    var costunit = $("#input_cost_unit").val();
                    //Take inventory unit
                    var inventoryunit = $("#input_inventoryunit").val();
                    //Take demand
                    var demand = $("#input_demand").val();
                    //Take cost of placing an order
                    var ordercost = $("#input_ordercost").val();
                    //Take lead time
                    var leadtime = $("#input_leadtime").val();
                    //Take holding cost
                    var holdingcost = $("#input_holdingcost").val();
                    //Calculate Optimal order quantity and round it to integer
                    var optimal_order_quantity = Math.round(Math.sqrt(2*demand*ordercost/(costunit*holdingcost/100)));
                    //Calculate Reorder point
                    var reorder_point = Math.round(demand/250*leadtime);
                    //Calculate Reorder period
                    var cycle_time = Math.round(250*optimal_order_quantity/demand);
                    //Check validity (if all forms are correct write output)
                    if (
                    form_input_is_string(product) &&
                        isNumber(costunit) &&
                        form_input_is_string(inventoryunit) &&
                        isNumber(demand) &&
                        isNumber(ordercost) &&
                        isNumber(leadtime) &&
                        isNumber(holdingcost) &&
                        holdingcost >= 0 &&
                        holdingcost <= 100 
                    
                )
                    
                    {
                        $(".output_product").text(product);
                        $(".output_cost_unit").text(costunit);
                        $(".output_inventoryunit").text(inventoryunit);
                        $(".output_demand").text(demand);
                        $(".output_ordercost").text(ordercost);
                        $(".output_leadtime").text(leadtime);
                        $(".output_holdingcost").text(holdingcost);
                        $(".output_optimal").text(optimal_order_quantity);
                        $(".output_reorder").text(reorder_point);
                        $(".output_cycle_time").text(cycle_time);
                        $("#input").toggle();
                        $("#output").toggle();
                    }
                    else{
                        alert('Please fill all the forms according to examples')
                    }
                })
            });
        </script>
    </head>
    <body>
        <h1>Dog Brews, Inc.</h1>
        <h2>Estimating Optimal Inventory <br>Policy</h2>
        <p id="policy_click">
            <u><font size="1">CONFIDENTIALITY POLICY(CLICK TO SHOW/HIDE)</font></u>
        </p>
        <p id="policy">
            This Web page is for Dog Brews employees only. It is the intellectual<br>
            property of Dog Brews, Inc.
        </p>
        <div id="input">
            <h3>Input</h3>
            <p>
                Please fill in the following values. Click the <strong>Estimate</strong> button<br>
                when you are ready.
            </p>
            <p>
                Product name (e.g., Lab Lager)<br>
                <input type="text" id="input_product">
            </p>
            <p>
                Inventory unit (e.g., bottle, case, keg)<br>
                <input type="text" id="input_inventoryunit">
            </p>
            <p>
                Cost per unit (e.g., 8)<br>
                <input type="text" id="input_cost_unit">
            </p>
            <p>
                Demand per year in units (e.g., 20000)<br>
                <input type="text" id="input_demand">
            </p>
            <p>
                Cost of placing an order (e.g., 25)<br>
                <input type="text" id="input_ordercost">
            </p>
            <p>
                Order lead time in working days (e.g., 4)<br>
                <input  type="text" id="input_leadtime"><br>
                (On average, there are 250 working days per year)
            </p>
            <p>
                Annual holding cost as a percentage of inventory value (e.g., 22)<br>
                <input type="text" id="input_holdingcost">
            </p>
            <p>
                <button type="button" id="estimate">Estimate</button>
            </p>
        </div>
        <div id="output">
            <h3>Output</h3>
            <h4>Estimated Optimal Inventory Policy for <span class="output_product"></span></h4>
            <h5>Inputs</h5>
            <p>
                Cost: <span class="output_cost_unit"></span> per <span class="output_inventoryunit"></span>
            </p>
            <p>
                Demand: <span class="output_demand"></span> <span class="output_inventoryunit"></span> per year
            </p>
            <p>
                Order cost: <span class="output_ordercost"></span> per order
            </p>
            <p>
                Order lead time: <span class="output_leadtime"></span> days
            </p>
            <p>
                Holding cost: <span class="output_holdingcost"></span>% of inventory value
            </p>
            <h5>Results</h5>
            <p>
                Optimal order quantity: <span class="output_optimal"></span> <span class="output_inventoryunit"></span>
            </p>
            <p>
                Reorder point: <span class="output_reorder"></span> <span class="output_inventoryunit"></span>
            </p>
            <p>
                Reorder period: <span class="output_cycle_time"></span> days
            </p>
            <p class="date"><strong>The date of analysis:</strong>
                <?php
                print date('d M Y G:i:s');
                ?>
            </p>
        </div>


    </body>
</html>