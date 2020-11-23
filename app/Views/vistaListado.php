<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMALES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">

        <?php 
        
            print_r($animales);
        
        ?>

        <div class="row row-cols-1 row-cols-md-3">
            <?php foreach($animales as $animal):?>

                <div class="col mb-4">
                    
                    <div class="card h-100">
                        <img src="<?= $animal["foto"]?>" class="card-img-top" alt="IMAGEN">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= $animal["nombre"]?></h5>
                            <p class="card-text"><?= $animal["descripcion"]?></p>
                            <p class="card-text">
                                <?php            
                                    if($animal["tipo"]==0){
                                        echo("TIPO: NO APLICA");
                                    }else if($animal["tipo"]==1){
                                        echo("TIPO: DOMESTICO");
                                    
                                    }else if($animal["tipo"]==2){
                                        echo("TIPO: FAUNA SILVESTRE");
                                    }
                                
                                ?>
                            </p>
                            <a href="<?php echo(base_url("public/animales/eliminar/".$animal["id"]))?>" class="btn btn-danger">Eliminar</a>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo($animal["id"])?>">
                                Editar
                            </button>
                        </div>
                        
                    </div>

                    <div class="modal fade" id="editar<?php echo($animal["id"])?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edición de Registros</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo(base_url("public/animales/editar/".$animal["id"])) ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nombre:</label>
                                            <input type="text" class="form-control" name="nombreEditar" value="<?= $animal["nombre"]?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Descripcion:</label>
                                                <textarea class="form-control" rows="3" name="descripcionEditar"><?= $animal["descripcion"]?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-warning">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach?>
        </div>
    
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>