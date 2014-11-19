<?php
    require("../model/config_sql.php");

    $id = $_GET['id'];
    if($id > 0)
    {  
        echo "<table class=\"table table-hover\">";
        echo "<tr>
                <th>Invoice Numbers</th>
                <th>Confirm Invoice</th>
                <th>Pending Invoice</th>
                <th>Invoice Status</th>
            </tr>";
        $query1 = "SELECT DISTINCT I.id, I.status FROM invoice I INNER JOIN ";
        $query2 = "SELECT DISTINCT invoice_number FROM ";
        if($id == 1)
        {   
            $query1 .= "general G ON I.type=\"general\" WHERE G.invoice_number=I.invoice_number;";
            $query2 .= "general;";
            $table = "invoice";
        }   
        else if($id == 2)
        {   
            $query1 .= "receipt R ON I.type=\"receipt\" WHERE R.invoice_number=I.invoice_number;";
            $query2 .= "receipt;";
            $table = "receipt";
        }   
        else if($id == 3)
        {   
            $query1 .= "purchase_order P ON I.type=\"purchase_order\" WHERE P.invoice_number=I.invoice_number;";
            $query2 .= "purchase_order;";
            $table = "purchase_order";
        }   
        else if($id == 4)
        {   
            $query1 .= "reimbursement R ON I.type=\"reimbursement\" WHERE R.invoice_number=I.invoice_number;";
            $query2 .= "reimbursement;";
            $table = "reimbursement";
        }   
        $rows = $mysqli->query($query1);
        $rows2 = $mysqli->query($query2);
        while($row = $rows->fetch_assoc() and $row2 = $rows2->fetch_assoc())
        {
            $inv_id = $row['id'];
            echo "<tr>
                <td><a href=template/$table.php?id=".$row['id'].">".$row2['invoice_number']."</a></td>
                <td><a class=\"btn btn-success\" onclick=\"invoice_confirm($inv_id, $id)\">Confirm</a></td>
                <td><a class=\"btn btn-danger\" onclick=\"pending($inv_id, $id)\">Pending</a></td>";
            if($row['status'] == 0)
                echo "<td>Pending</td>";
            else
                echo "<td>Confirmed</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

