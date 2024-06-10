<?php
include_once('nav.php');
?>



<!--Novo Visualizar teste -->
<div class="container">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Despesas</h2>
        <span>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        </span>
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Despesas</li>
        </ol>
    </div>

    
    <div class="card mb-4 border-ligth shadow">

        <div class="card-header hstack gap-2">
            <span class="row">
                <?php

                    $resultado = mysqli_query($conn, "SELECT sum(valorsaida) FROM despesas WHERE id_user = '$id_usuario'");
                    $linhas = mysqli_num_rows($resultado);

                    if ($linhas > 0) {
                        while ($linhas = mysqli_fetch_array($resultado)) {
                            echo "<h4 class='text-danger'>" . "Total Despesas $" . number_format((float)$linhas['sum(valorsaida)'], 2, '.', ',') . "</h4>";
                        }
                    } else {
                        echo "<h4 class='text-danger'>" . "Total Despesas R$ - " . "</h4>";
                    }
                ?>
            </span>
            <span class="ms-auto">
                     <a class="btn btn-info" href="actions/desp_pdf.php"><i class="fa-solid fa-file-pdf"></i> Gerar Pdf</a>
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     <i class="fa-solid fa-plus"></i> Despesas
                    </button>      
            </span>
            
        </div>

        <div class="card-body">
            <!-- <x-alert /> -->

            <table class="table table-hover ">

                <thead>
                    <tr>

                        <th class="d-none d-sm-table-cell">ID</th>
                        <th>Descrição</th>
                        <th class="d-none d-md-table-cell">Despesa $</th>
                        <th>Fiscal</th>
                        <th>Data de Saida</th>
                        <th class="d-none d-md-table-cell">Data de cadastro</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Imprimir os registros -->
                    <?php
                    $result_cad = "SELECT id, descricao,valorsaida, document, data_saida, created FROM despesas 
                                        WHERE id_user = '$id_usuario'
                                        ORDER BY id DESC";
                    $resultado_desp = mysqli_query($conn, $result_cad);

                    while ($row_desp = mysqli_fetch_assoc($resultado_desp)) {
                        // var_dump($row_ent);
                        echo "<tr>";
                        echo "<th class='d-none d-sm-table-cell'>" . $row_desp['id'] . "</th>";
                        echo "<td>" . $row_desp['descricao'] . "</td>";
                        echo "<td class='d-none d-md-table-cell'>" . 'R$ ' . number_format((float)$row_desp['valorsaida'], 2, '.', ',') . "</td>";
                        echo "<td> <a target='_blank' href='./uploads/" .  $row_desp['document']."'>". "<img src='./uploads/" .  $row_desp['document']."' alt='' srcset=''style=' width: 20px;'>" ."</a>   </td>";
                        echo " <td>" . date('d/m/Y', strtotime($row_desp['data_saida'])) . "</td>";
                        echo " <td>" . date('d/n/Y H:i:s',strtotime($row_desp['created'])) . "</td>";

                        // echo "<td class='d-none d-md-table-cell'>". date('d/m/Y', strtotime($row_ent['created'])) ."</td>"; 

                        echo "<td class='d-md-flex flex-row justify-content-center'>" .
                            "<a href='#' class='btn btn-warning btn-sm me-1 mb-1 mb-md-0'><i class='bi bi-pen'></i></i> Editar</a>" .
                            "<a href='actions/delete_desp.php?id=".$row_desp['id'] ."' class='btn btn-danger btn-sm me-1 mb-1 mb-md-0'><i class='bi bi-trash3-fill'></i> Excluir</a>" . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
                </tbody>

            </table>
                    
        </div>
    </div>
</div>
<div style="height: 400px;"></div>
<img src="" alt="" srcset="">

<!-- Inicio Modal cadastrar usuario -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Saida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="actions/cad_despesa.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<? $id_usuario ?>">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label">Descrição</label> <br>
                        <input type="text" id="descricao" class="form-control" name="descricao" placeholder="Descreva destino.." required/>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label  class="form-label">Despesa</label>
                        <input type="text" id="despesa" class="form-control" name="despesa" placeholder="Digite o valor" required/>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label for="Data">Cupom fiscal/imagem: png, jpg</label> <br>
                        <input type="file"  name="arquivo" />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label  class="form-label">Data de saida</label> <br>
                        <input type="date" id="data_saida" class="form-control" name="data_saida" required/>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
        <!-- <button type="button" class="btn btn-primary">Salvar</button> -->
        <input type="submit" class="btn btn-danger" value="Salvar">
      </div>
    </div>
  </div>
</div>
    <!-- Fim Modal cadastrar usuario -->

    
<?php  require_once('footer.php') ?>
