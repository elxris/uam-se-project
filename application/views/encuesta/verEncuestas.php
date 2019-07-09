<div class="container">
    <div class="center">
        <table class="table table-hover">
            <h1 class="text-center">Encuestas </h1>
            <br/>
            <br/>
            <br/>
            <thead>
                <!--<tr>
                    <th scope="col" class="text-center"> Encuestas </th>
                    <!--<th scope="col"> id Cuestionario </th>
                </tr> -->
            </thead>
            <tbody>
                <?php
                if($encuesta != FALSE){
                    foreach ($encuesta->result() as $row){
                        echo "<tr>";
                        echo "<th>".$row->nombreEncuesta."</th>";
                        echo "<td></td>";
                        echo "<td><a class='btn btn-primary' href=".base_url()."cuestionario/index/".$row->idEncuesta."> Editar "
                            . "<samp class='glyphicon glyphicon-pencil' aria-heidden='TRUE'></samp>"
                            . "</a> ";
                        echo "<td><a class='btn btn-danger' href=".base_url()."cuestionario/index/".$row->idEncuesta."> Eliminar "
                            . "<samp class='glyphicon glyphicon-remove' aria-heidden='TRUE'></samp>"
                            . "</a> ";
                        echo"</tr>";    
                    }
                }
                else{
                    echo 'No hay Encuestas';
                }
                ?>  
            </tbody>
        </table>
        <div class="text-center">
            <a  class="btn btn-info" href="<?=base_url()?>encuesta/agregar">
                <span class="glyphicon glyphicon-plus" aria-heidden="true"></span> Agregar Encuesta
            </a>
        </div>
    </div>        
</div>    
