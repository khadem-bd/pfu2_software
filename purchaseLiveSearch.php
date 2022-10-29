<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $searchResult = $_POST['searchPurchase'];

    $sql = "SELECT orders.order_id,customers.name,orders.product_desc,orders.qty, 
    orders.size,orders.color,orders.order_date, orders.country_of_origin,
    orders.total_price,purchased.destination,
    purchased.card_used,purchased.buying_UP,purchased.buying_BDT,purchased.gross_profit,
    purchased.purchase_date from orders INNER JOIN customers
    ON orders.customer_id = customers.customer_id INNER JOIN purchased 
    ON orders.id=purchased.o_id WHERE order_id LIKE '%{$searchResult}%' 
    OR name LIKE '%{$searchResult}%' OR card_used LIKE '%{$searchResult}%' OR product_desc LIKE '%{$searchResult}%' 
    OR destination LIKE '%{$searchResult}%' OR country_of_origin LIKE '%{$searchResult}%' ORDER BY purchase_date DESC"; 

    $result = $conn->query($sql);
    $html="";
    if(mysqli_num_rows($result)>0){
        $html = '<table>
        <thead>
        <tr>

        <th class="text-center">Order ID</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Product Description</th>
        <th class="text-center">Size</th>
        <th class="text-center">Color</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Selling Price</th>
        <th class="text-center">Buying Price (in USD/GBP)</th>
        <th class="text-center">Buying Price (in BDT)</th>
        <th class="text-center">Gross Profit</th>
        <th class="text-center">Card Used</th>
        <th class="text-center">Source</th>
        <th class="text-center">Country</th>
        <th class="text-center">Order Date</th>
        <th class="text-center">Purchase Date</th>

        </tr>
        </thead>';
        while($row = $result->fetch_assoc()){
            $html.= "<tr>
            <td class='text-center'>".$row['order_id']."</td>
            <td class='text-center'>".$row['name']."</td>
            <td class='text-center'>".$row['product_desc']."</td>
            <td class='text-center'>" .$row['size']."</td>
            <td class='text-center'>".$row['color']."</td>
            <td class='text-center'>".$row['qty']."</td>
            <td class='text-center'>".$row['total_price']."</td>
            <td class='text-center'>". $row['buying_UP']."</td>
            <td class='text-center'>".$row['buying_BDT']."</td>
            <td class='text-center'>".$row['gross_profit']."</td>
            <td class='text-center'>".$row['card_used']."</td>
            <td class='text-center'>". $row['destination']."</td>
            <td class='text-center'>".$row['country_of_origin']."</td>
            <td class='text-center'>".$row['order_date']."</td>
            <td class='text-center'>".$row['purchase_date']."</td>
        </tr>";
        }
        $html.= '</table>';
        echo $html;
    }else{
        echo "<h6 class='error-message'>No Purchase Record Found with the search. . .</h6>";
    }
?>
