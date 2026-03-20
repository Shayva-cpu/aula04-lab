<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <title>CodeForce - Controlo de Acesso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4 text-center">🎫 Sistema de Geração de Bilhetes Super Épico</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <form method="POST" action="index.php">
              <div class="mb-3">
                <label class="form-label">Qual a sua idade?</label>
                <input type="number" class="form-control" name="idadeUsuario" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tipo de Bilhete</label>
                <select class="form-select" name="tipoBilhete">
                  
                  <option value="pista">Pista Padrão</option>
                  <option value="vip">Camarote VIP</option>
                  <option value="camarote">Camarote Mais Legal</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Quantidade de Bilhetes (Máx 10)</label>
                <input type="number" class="form-control" name="quantidade" value="1" min="1" max="10"
                required>
              </div>
              <div class="mb-3">
                <label class="form-label">Qual o cupom?(Opcional)</label>
                <input type="text" class="form-control" name="Cupom-Super-Legal" >
              </div>
              <button type="submit" class="btn btn-dark w-100">Gerar Bilhetes</button>
            </form>
          </div>
        </div>

        <div class="mt-4">
          <?php
          // =========================================================================
          // ÁREA DE PROGRAMAÇÃO PHP - LÓGICA BOOLEANA
          // =========================================================================

          // Verificamos se o formulário foi submetido para evitar erros no ecrã inicial
          if (isset($_POST['idadeUsuario']) && isset($_POST['tipoBilhete'])) {

            // 1. RECOLHA DE DADOS (O "Input" do utilizador)
            $idade = $_POST['idadeUsuario'];
            $bilhete = $_POST['tipoBilhete'];
            $quantidadeDesejada = (int)$_POST['quantidade'];
            $cupom = $_POST['Cupom-Super-Legal'];

            echo "<h4>Resultado da Validação:</h4>";

            // TODO: 2. CRIAR A LÓGICA DE ACESSO (if / else if / else)
            // Regra 1: Se a idade for menor que 18, o acesso é NEGADO (independente do bilhete).
            // Regra 2: Se for maior ou igual a 18 E o bilhete for "vip", exibir ACESSO VIP LIBERADO.
            // Regra 3: Se for maior ou igual a 18 E o bilhete for "pista", exibir ACESSO PISTA LIBERADO.

            // Escreva o seu código abaixo:

             if ($idade < 18) {
              echo "Acesso Negado";
            }
             else {
            /*
              switch ($bilhete){
                case 'camarote':
                  echo "Acesso Camarote";
                  break;
                case 'vip':
                  echo "Acesso VIP";
                  break;
                case 'pista':
                  if ($cupom == 'Cupom-Super-Legal')
                   
                    {
                    echo "VIP Liberado"; }
                    elseif ($cupom !== 'Cupom-Super-Legal')
                      { echo "Cupom Inválido"; }
                  else {
                      echo "Pista Liberada"; }
                    break;
                  default: echo "Bilhete Inválido";
                  break;
                  }
                  */
                $nomeSetor = '';
                switch ($bilhete) {
                  case 'vip':
                    $nomeSetor = 'Camarote VIP';
                    break;
                  case 'pista':
                    if ($cupom === 'Cupom-Super-Legal') {
                      $nomeSetor = 'Pista (UPGRADE VIP)';
                    } else {
                      $nomeSetor = 'Pista Pedrão';
                    }
                    break;

                    }
                  echo "<h5>Imprimindo {$quantidadeDesejada} bilhete(s) para: {$nomeSetor}</h5>";
                  echo '<ul class="list-group mb-3 shadow-sm">';

                  $bilheteAtual = 1;

                  while ($bilheteAtual <= $quantidadeDesejada) {
                    echo "<li class='list-group-item'>";
                    echo "Bilhete #{$bilheteAtual} (Cód: " . rand(1000, 9999) . ")";
                    echo "</li>";

                    $bilheteAtual++;
                  }
                    echo '</ul>';
                    echo '<div class="alert alert-sucess fw-bold"> Lote Gerado Com Sucesso!</div>';
                    
                }
                  }
              
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>