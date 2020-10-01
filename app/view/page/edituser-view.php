<div class="container">
    <h2>Agregar usuario</h2>   
    <form action="<?php echo SERVER_URL . 'Pages/edit_user/' . $data['id']; ?>" method="POST">
        <div class="form-group">
            <label>Nombre</label>
            <input 
                type="text" 
                name="name" 
                class="form-control"  
                placeholder="Ingresar nombre"
                value="<?php echo $data['name']; ?>"
            >
        </div>
        <div class="form-group">
            <label>Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                placeholder="Ingresar email"
                value="<?php echo $data['email']; ?>"
            >
        </div>
        <div class="form-group">
            <label>Telefono</label>
            <input 
                type="text" 
                name="phone" 
                class="form-control" 
                placeholder="Ingresar telefono"
                value="<?php echo $data['phone']; ?>"
            >
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

