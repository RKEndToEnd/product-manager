<?php
if ($statement->rowCount() > 0)
{
    foreach ($statement->fetchAll() as $row)
    {
        $product_status = '';
        if ($row['product_status'] == 'Dostępny')
        {
            $product_status = '<div class="badge bg-success">Dostępny</div>';
        }else{
            $product_status = '<div class="badge bg-danger">Niedostępny</div>';
        }
        echo'   <tr>
                                        <td>'.$row["product_name"].'</td>
                                        <td>'.$row["product_category"].'</td>
                                        <td>'.$row["product_description"].'</td>
                                        <td>'.$product_status.'</td>
                                        <td>'.$row["created_at"].'</td>
                                        <td>'.$row["updated_at"].'</td>
                                        <td>                                    
                                        </td>
                                    </tr>
                            ';
    }
}else{
    echo'<tr><td colspan="4" class="text-center">Brak danych w tabeli</td></tr>';
}