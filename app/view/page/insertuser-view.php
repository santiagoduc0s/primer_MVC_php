<div class="container">
    <h2>Agregar usuario</h2>   
    <form action="<?php echo SERVER_URL . 'Pages/insert_user'; ?>" method="POST">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Ingresar nombre">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Ingresar email">
        </div>
        <div class="form-group">
            <label>Telefono</label>
            <input type="text" name="phone" class="form-control" placeholder="Ingresar telefono">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

