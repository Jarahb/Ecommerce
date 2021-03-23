 <div class="row mt-1"> 
           <!--Consulta para que muestre sólo una imagen x producto en el index-->
            <?php foreach ($infoProducto as $producto):?>
                   <div class="col-lg-4 col-md-6 col-sm-12">
                       <div class="card border-primary">
                           <img class="card-img-top img-thumbnail" src="<?=$producto['web_path'] ?>" alt="">
                           <div class="card-body text-center">
                               <h2 class="card-title w-100 border-bottom border-primary pb-2"><strong class="text-primary"><?=$producto['nombre'] ?></strong></h2>
                               <div class="row d-flex align-items-center justify-content-around p-2">
                                   <span><strong>Precio: </strong><?=$producto['precio']?></span>
                                   <span><strong>Existencias: </strong><?=$producto['existencias']?></span>
                               </div>
                               <a href="index1.php?modulo=deralleproducto&id=<?php echo $producto['id'] ?>" class="btn btn-primary btn-sm">Ver</a>
                           </div>
                       </div>
                   </div>
               <?php endforeach;?>
       </div>
        <!--Paginador:Creo los botones del paginador-->
        <?php
        if($totalPaginas>0){
        ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php
                        if( $paginaSel!=1 ){
                    ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="index1.php?modulo=productos&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Anterior</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                        for($i=1;$i<=$totalPaginas;$i++){
                     ?>
                    <li class="page-item <?php echo ($paginaSel==$i)?" active ":" "; ?>">
                    <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                    <?php
                        if( $paginaSel!=$totalPaginas ){
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Siguente</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>
        <?php
        }
        ?>