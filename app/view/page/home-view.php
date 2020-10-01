<h1><?php echo $data['title'] ?></h1>
<div class="table">
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['users'] as $users) : ?>
                <tr>
                    <td><?php echo $users->id; ?></td>
                    <td><?php echo $users->name; ?></td>
                    <td><?php echo $users->email; ?></td>
                    <td><?php echo $users->phone; ?></td>
                    <td>
                        <a href="<?php echo SERVER_URL . 'Pages/edit_user/' . $users->id; ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo SERVER_URL . 'Pages/delete_user/' . $users->id; ?>">
                            Borrar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>