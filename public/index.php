<!-- En esta pagina se van a cargar todas las vistas y mostrar todos los datos al usuario. Todo va aparecer en esta
pagina. Todas las direcciones tienen como raiz al 'index'  -->
<?php require_once '../app/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once '../app/view/include/header.php'; ?>
</head>
<body>
    <nav>
        <?php include_once '../app/view/include/navbar.php'; ?>
    </nav>
    <main>
        <div class="container">
            <?php $initiation = new Core; ?> <!-- inicializa el sistema -->
        </div>
    </main>
    <footer>
        <?php include_once '../app/view/include/footer.php'; ?>
    </footer>
    <?php include_once '../app/view/include/script.php'; ?>
</body>
</html>
