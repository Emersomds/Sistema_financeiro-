<?php
include_once('nav.php');
?>

<!--Novo Visualizar teste -->
<div class="container">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Receitas</h2>
        <span>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </span>
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"></li>
        </ol>
    </div>


    <div class="card mb-4 border-ligth shadow">

        <div class="card-header hstack gap-2">
            <span class="row">
                <?php

                $resultado = mysqli_query($conn, "SELECT sum(valorentrada) FROM receitas WHERE id_user = '$id_usuario'");
                $linhas = mysqli_num_rows($resultado);

                if ($linhas > 0) {
                    while ($linhas = mysqli_fetch_array($resultado)) {

                        echo "<h4 class='text-success'>" . "Total Receitas R$ " . number_format((float)$linhas['sum(valorentrada)'], 2, '.', ',') . "</h4>";
                    }
                } else {
                    echo "<h4 class='text-success'>" . "Total Receita R$ " . "</h4>";
                }
                ?>
            </span>
            <span class="ms-auto">
                <a class="btn btn-info" href="actions/receit_pdf.php"><i class="fa-solid fa-file-pdf"></i> Gerar Pdf</a>
                    
               
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i> Receita
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
                        <th class="d-none d-md-table-cell">Receita $</th>
                        <th>Nota</th>
                        <th>Data de entrada</th>
                        <th class="d-none d-md-table-cell">Data de cadastro</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Imprimir os registros -->
                    <!-- @forelse ($courses as $course) -->
                    <?php
                    $result_cad = "SELECT id, descricao, valorentrada, document, data_entra, created FROM receitas
                                        WHERE  id_user = '$id_usuario' 
                                        ORDER BY id DESC";
                    $resultado_ent = mysqli_query($conn, $result_cad);

                    while ($row_ent = mysqli_fetch_assoc($resultado_ent)) {
                        // var_dump($row_ent);
                        echo "<tr>";
                        echo "<th class='d-none d-sm-table-cell'>" . $row_ent['id'] . "</th>";
                        echo "<td>" . $row_ent['descricao'] . "</td>";
                        echo "<td class='d-none d-md-table-cell'>" . 'R$ ' . number_format((float)$row_ent['valorentrada'], 2, '.', ',') . "</td>";
                        echo "<td> <a target='_blank' href='./uploads/" .  $row_ent['document']."'>". "<img src='./uploads/" .  $row_ent['document']."' alt='' srcset=''style=' width: 20px;'>" ."</a>   </td>";
                        echo " <td>" . date('d/m/Y', strtotime($row_ent['data_entra'])) . "</td>";
                        echo " <td>" . $row_ent['created'] . "</td>";

                        // echo "<td class='d-none d-md-table-cell'>". date('d/m/Y', strtotime($row_ent['created'])) ."</td>"; 

                        echo "<td class='d-md-flex flex-row justify-content-center'>" .
                            "<a href='#' class='btn btn-warning btn-sm me-1 mb-1 mb-md-0'><i class='bi bi-pen'></i></i> Editar</a>" .
                            "<a href='actions/delete_entra.php?id=" . $row_ent['id'] . "' class='btn btn-danger btn-sm me-1 mb-1 mb-md-0'><i class='bi bi-trash3-fill'></i> Excluir</a>" . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
                </tbody>

            </table>

        </div>
    </div>
</div>
<!-- Inicio Modal cadastrar usuario -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Receita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/cad_receita.php" method="post" enctype="multipart/form-data">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label>Descrição</label> 
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descreva origem.." required />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label>Receita</label> 
                        <input type="text" id="receita" name="receita" class="form-control" placeholder="Digite o valor" required />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label for="Data">Cupom fiscal/ imagem: png, jpg</label> <br>
                        <input type="file"  name="arquivo"/>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label>Data de entrada</label> 
                        <input type="date" id="data" name="data_entra" class="form-control" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                <!-- <button type="button" class="btn btn-primary">Salvar</button> -->
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
    </div>
</div>
<!-- Fim Modal cadastrar usuario -->


<div style="height: 400px;"></div>
<?php require_once('footer.php') ?>
