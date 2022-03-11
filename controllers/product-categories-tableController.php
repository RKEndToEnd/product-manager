<?php
if ($statement->rowCount() > 0)
{
    foreach ($statement->fetchAll() as $row)
    {
        $category_status = '';
        if ($row['category_status'] == 'Aktywna')
        {
            $category_status = '<div class="badge bg-success">Aktywna</div>';
        }else{
            $category_status = '<div class="badge bg-danger">Niekatywna</div>';
        }
        echo'   <tr>
                    <td>'.$row["category_name"].'</td>
                    <td>'.$category_status.'</td>
                    <td>'.$row["created_at"].'</td>
                    <td>'.$row["updated_at"].'</td>
                    <td></td>
                </tr>
        ';
    }
}else{
    echo'<tr><td colspan="4" class="text-center">Brak danych w tabeli</td></tr>';
}
