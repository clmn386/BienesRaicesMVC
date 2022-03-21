<?php

/*     use App\Propiedad;

    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $propiedades = Propiedad::all();
    }else{
        $propiedades = Propiedad::get(3);
    }
 */
?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) { ?>
        <div class="anuncio">
    
        <?php $reseña = substr($propiedad->descripcion ,0 ,100); ?>
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">


            <div class="contenido-anuncio">
                <div class="contenido-anuncio_titulo">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                </div>

                <div class="contenido-anuncio_reseña">
                    <p><?php echo $reseña ?><br> <a href="/anuncio.php?id=<?php echo $propiedad->id; ?>"> mas...</a></p>
                </div>

                <div class="contenido-anuncio_varios">
                    <p class="precio">$ <?php echo $propiedad->precio; ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->estacionamientos; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>

                    <a href="/anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                        <?php echo $propiedad->id; ?>
                    </a>
                </div>

            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
    <?php } ?>
</div> <!--.contenedor-anuncios-->

<?php 

    
?>