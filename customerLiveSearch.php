<?php 
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $searchResult = $_POST['searchItem'];
    
    $sql = "SELECT * FROM customers WHERE customer_id LIKE '%{$searchResult}%'
            OR name LIKE '%{$searchResult}%'
            OR contact_no LIKE '%{$searchResult}%'
            OR email_address LIKE '%{$searchResult}%'";

    $result = $conn->query($sql);
    $html="";
    if(mysqli_num_rows($result)>0){
        $html = '<table>
        <thead>
        <tr>
            <th class="text-center">Customer ID</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Contact Number</th>
            <th class="text-center">Email Address</th>
            <th class="text-center">Shipping Address</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>';
        while($row = $result->fetch_assoc()){
            $html.= '<tr>
            <td class="text-center">'. $row["customer_id"].'</td>
            <td class="text-center">'. $row["name"].'</td>
            <td class="text-center">'. $row["contact_no"].'</td>
            <td class="text-center">'.$row["email_address"].'</td>
            <td class="text-center">'. $row["shipping_address"].'</td>
            <td class="text-center">
            <a class="icons edit-icon editCustomerInfo" 
            data-toggle="modal" data-target="#editCustomer"
            data-id="'. $row["id"].' " 
            data-customerID="'. $row["customer_id"].'" 
            data-name="'. $row["name"].'"
            data-contactNo="'. $row["contact_no"].'"
            data-email="'.$row["email_address"].'"
            data-shipping="'.$row["shipping_address"].'"
            href="javascript:void(0)">
                <span class="es-edit">Edit</span>
             </a>
            </td>
            <td class="text-center"><a class="icons delete-icon btn-delete" href="javascript:void(0)" data-url="#" data-key="'.($row["id"]).'"><span class="es-delete"></span>Delete</a></td>
        </tr>';
        }
        $html.= '</table>';
        echo $html;
    }else{
        echo "<h4>No Record Found with the search</h4>";
    }
?>