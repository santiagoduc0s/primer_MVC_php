<h1><?php echo $data['title']; ?></h1>
<div class="table">
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['products'] as $product) : ?>
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->name; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
