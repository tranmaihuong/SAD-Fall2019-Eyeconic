<!DOCTYPE html>
<html>

<head>
    <title>Glasses</title>
</head>

<body>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Age</td>
        </tr>
        <?php foreach ($ttt as $item):?>
            <tr>
                <td><?php echo $item->ProductId; ?></td>
                <td><?php echo $item->BrandId; ?></td>
                <td><?php echo $item->Shape; ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>


</body>

</html>