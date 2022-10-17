<?php 
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $searchResult = $_POST['searchOrder'];
    
    $sql = "SELECT orders.order_id,customers.customer_id,customers.name,customers.contact_no,orders.grand_total,
    orders.order_date,orders.status from ORDERS INNER JOIN 
    customers ON orders.customer_id = customers.customer_id GROUP BY order_id ORDER BY order_date DESC
    WHERE order_id LIKE '%{$searchResult}%'";

    $result = $conn->query($sql);
    $html="";
    if(mysqli_num_rows($result)>0){
        $html = '<table>
        <thead>
        <tr>
            <th class="text-center">Order ID</th>
            <th class="text-center">Order Date</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Contact No</th>
            <th class="text-center">Order Value</th>
            
        </tr>
        </thead>';
        while($row = $result->fetch_assoc()){
            $html.= "<tr>
            <td><a class='viewOrderInfo' id='drilldown-summary' href='#order-history' data-orderInfo='" . $row['order_id'] . "'>" . $row['order_id'] . "</a></td>
            <td class='text-center'>" . $row['order_date'] . "</td> 
            <td class='text-center'>" . $row['name'] . "</td> 
            <td class='text-center'>" . $row['contact_no'] . "</td>
            <td class='text-center'>" . $row['grand_total'] . "</td>
        </tr>";
        }
        $html.= '</table>';
        echo $html;
    }else{
        echo "<h4>No Record Found with the search</h4>";
    }
?>