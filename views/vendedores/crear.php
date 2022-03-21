<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
            <?php endforeach; ?>
            
        <a href="/admin" class="boton boton-verde">Volver</a>

        <form action="" class="formulario" method="POST" action="/views/vendedores/crear.php" enctype="multipart/form-data">
           <?php include __DIR__.'/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">

        </form> 

    </main>