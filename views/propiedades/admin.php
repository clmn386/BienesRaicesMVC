<main class="contenedor seccion">
        <h1>administrador de Bienes Raices</h1>

        <?php
            if($resultado) { 
                $mensaje = mostrarNotificacion( intval($resultado) );
                if($mensaje) { ?>
                    <p class="alerta exito"> <?php echo san($mensaje) ?> </p>
            <?php } ?>
        <?php } ?>

        <a href="propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
        <a href="vendedores/crear" class="boton boton-amarillo">Nueva Vendedor</a>

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php foreach( $propiedades as $propiedad ): ?>
                <tr class="centrado">
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td> <?php echo "$ ".$propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">

                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>"> 
                            <input type="hidden" name="tipo" value="propiedad"> 
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualiza</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>