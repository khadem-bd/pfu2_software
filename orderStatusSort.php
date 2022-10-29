<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $dropDownResult = $_POST['statusSort'];

    

    $sql = "SELECT orders.order_id,customers.name,customers.contact_no,orders.grand_total,
    orders.order_date from orders INNER JOIN
    customers ON orders.customer_id = customers.customer_id 
    WHERE status = '$dropDownResult'
    GROUP BY order_id ORDER BY order_date DESC"; 

    $result = $conn->query($sql);
    $html="";
    if(mysqli_num_rows($result)>0){
        $html = '<table>
        <thead>
        <tr>
            <th class="text-left">Order ID</th>
            <th class="text-left">Order Date</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Contact No</th>
            <th class="text-center">Order Value</th>
            <th class="text-center">Download Invoice</th>

        </tr>
        </thead>';
        while($row = $result->fetch_assoc()){
            $html.= "<tr>
            <td class='text-left'><a class='viewOrderInfo' id='drilldown-summary' href='#order-history' data-orderInfo='" . $row['order_id'] . "'>" . $row['order_id'] . "</a></td>
            <td class='text-left'>" . $row['order_date'] . "</td>
            <td class='text-center'>" . $row['name'] . "</td>
            <td class='text-center'>" . $row['contact_no'] . "</td>
            <td class='text-center'>" . $row['grand_total'] . "</td>
            <td class='text-center'>
                <a class='icons general-icon' href=''><span class='es-download'>Download</span></a>
            </td>
        </tr>";
        }
        $html.= '</table>';
        echo $html;
    }else{
        echo "<h6 class='error-message'><strong>Hurray!</strong> All Products purchased successfully</h6>";
    }
?>
