 <?php
   
    require_once('nav.php');


    $resultado = mysqli_query($conn, "SELECT sum(valorsaida) FROM despesas WHERE id_user = '$id_usuario'");
    $linhas = mysqli_num_rows($resultado);


    $linhas = mysqli_fetch_array($resultado);
    $linhas['sum(valorsaida)'];


    $result = mysqli_query($conn, "SELECT sum(valorentrada) FROM receitas WHERE id_user = '$id_usuario'");
    $entrada = mysqli_num_rows($result);


    $entrada = mysqli_fetch_array($result);
    $entrada['sum(valorentrada)'];

    $disponivel = $entrada['sum(valorentrada)'] - $linhas['sum(valorsaida)'];
    ?>

 <div class="container-fluid px-4">
     <div class="mb-1 hstack gap-2 border-ligth shadow">
         <h2 class="mt-3">Dashboard</h2>
         <ol class="breadcrumb mb-3 mt-3 ms-auto">
             <li class="breadcrumb-item">
                 <a href="#" class="text-decoration-none">Home</a>
             </li>
         </ol>
     </div>
     <div class="top" style="margin-top: 70px;"></div>
     <div class="row">
         <div class="col-xl-4 col-md-6 ">
             <div class="card text-white mb-4 border-ligth shadow" id="cardReceita">
                 <div class="card-body"><b>Receita</b></div>
                 <div class="card-footer d-flex align-items-center justify-content-between">
                     <i class="fa-solid fa-brazilian-real-sign"></i>
                     <?php
                        if ($entrada['sum(valorentrada)'] > 0) {
                            echo "<b>". number_format($entrada['sum(valorentrada)'], 2, '.', ',') ."</b>";
                        } else {
                            $entrada['sum(valorentrada)'] = 0;
                            echo "<b>" . "0,00". "</b>";
                        }
                        ?>
                     <div class="small text-white"><i class="fa-regular fa-circle-down" style="color: #006400;font-size:18px;"></i></div>
                 </div>
             </div>
         </div>
         <div class="col-xl-4 col-md-6">
             <div class="card text-white mb-4 border-ligth shadow" id="cardDespesa">
                 <div class="card-body"><b>Despesas</b></div>
                 <div class="card-footer d-flex align-items-center justify-content-between">
                     <i class="fa-solid fa-brazilian-real-sign"></i>
                     <?php
                        if ($linhas['sum(valorsaida)'] > 0) {

                            echo "<b>". number_format($linhas['sum(valorsaida)'], 2, '.', ',')."</b>";
                        } else {
                            $linhas['sum(valorsaida)'] < 0;
                            echo "<b style=' color: red'>" . " R$: 0,00 </b>";
                        }
                        ?>
                     <div class="small text-white"><i class="fa-regular fa-circle-up" style="color: #FF0000;font-size:18px;"></i></div>
                 </div>
             </div>
         </div>
         <div class="col-xl-4 col-md-6">
             <div class="card text-white mb-4 border-ligth shadow" id="caixa">
                 <div class="card-body"><b>Caixa</b></div>
                 <div class="card-footer d-flex align-items-center justify-content-between">
                     <i class="fa-solid fa-brazilian-real-sign"></i>
                     <?php
                        if ($disponivel > 1) {
                            echo "<b>". number_format($disponivel, 2, '.', ',') ."</b>";
                        } else {
                            echo "<b style=' color: red;'>" . number_format($disponivel, 2, '.', ',') . "</b>";
                        }
                        ?>
                     <div class="small text-white"><i class="fa-solid fa-circle-dollar-to-slot" style="color: #006400;font-size:18px;"></i></div>
                 </div>
             </div>
         </div>
     </div>
     <div class="card-header hstack gap-2 border-ligth shadow">
         <span class="mt-3"><i class="fa-regular fa-calendar"></i> Data | Hora</span>
         <span class="ms-auto border-ligth shadow" style="background-color: #146c43; width: 200px; border-radius: 5px;">
             <i style=" color: white;"> <?php echo Date('d-m-Y  H:i:s'); ?></i></p>
         </span>
     </div>
 </div>

 <?php include_once('footer.php'); ?>