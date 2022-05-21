<div class="col-12">
    <div class="elements-title mb-15">
        <span>Filtros</span>
        <h4>Categorias</h4>
    </div>
</div>

<!-- ##### Accordians ##### -->
<div class="accordion" id="accordionExample">

    <div class="accordion-item">
        <h2 class="accordion-header" id="heading">
            <a href="#" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0">TODOS</a>
        </h2>
        <div id="collapse0" class="accordion-collapse collapse <?php echo $marcador; ?>" aria-labelledby="heading" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a href="productos.php" id="0"><strong>Todos</strong></a>
            </div>
        </div>
    </div>

    <?php
    if (mysqli_num_rows($tipo) > 0) {
        while ($res = mysqli_fetch_assoc($tipo)) {
            $cont++;
            if ($res['idtipo'] == $mx) {
                $mx2 = 'show';
            } else {
                $mx2 = '';
            }
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $cont; ?>">

                    <a href="#" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $cont; ?>" aria-expanded="false" aria-controls="collapse<?php echo $cont; ?>"><?php echo $res['nombre']; ?></a>
                </h2>
                <div id="collapse<?php echo $cont; ?>" class="accordion-collapse collapse <?php echo $mx2; ?>" aria-labelledby="heading<?php echo $cont; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                        $query = "select c.idcategoria, CONCAT(UCASE(LEFT(c.nombre , 1)), SUBSTRING(c.nombre , 2)) as nombre from categoria c where idtipo = " . $res['idtipo'];
                        $categoria = ejecutarConsulta($query);
                        if (mysqli_num_rows($categoria) > 0) {
                            while ($res2 = mysqli_fetch_assoc($categoria)) {
                                ?>

                                <a href="productos.php?cat=<?php echo $res2['idcategoria']; ?> " id="opcion"><strong><?php echo $res2['nombre']; ?></strong></a>        
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>        
            <?php
        }
    }
    ?>

</div>
<!-- fin del acordeon -->
<div class="col-12">
    <div class="elements-title mb-15 mt-50">
        <h4>Marcas</h4>
    </div>
</div>

<!-- ##### Accordians ##### -->
<div class="card">
    <div class="card-body">
        <?php
        if (mysqli_num_rows($marcas) > 0) {
            ?>
            <a href = "productos.php" >Todos</a>
            <hr>
            <?php
            while ($res = mysqli_fetch_assoc($marcas)) {
                ?>
                <a href="productos.php?marca=<?php echo $res['idmarcas']; ?>" ><?php echo $res['nombre']; ?></a>
                <hr>
                <?php
            }
        } else {
            echo '<p>No hay resultados</p>';
        }
        ?>
    </div>
</div>