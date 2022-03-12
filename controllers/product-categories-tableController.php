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
                    <td><a href="product-categories.php?action=edit&code='.convert_data($row["category_id"]).'" class="btn btn-sm btn-outline-warning" title="Edycja kategorii"><i class="fas fa-edit"></i></a></td>
                </tr>
        ';
    }
}else{
    echo'<tr><td colspan="4" class="text-center">Brak danych w tabeli</td></tr>';
}
