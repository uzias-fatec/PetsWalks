<!DOCTYPE html>
<html lang="pt-br">

<!-- Adicionando Javascript -->
<script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Meu Estilo CSS Personalizado -->
    <link rel="stylesheet" href="css/mystyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/FontAwesome/css/all.css">
    <link rel="icon" href="" >
    <title>Cadastro</title>
  </head>

  <body>

   <header> <!-- CABEÇALHO INICIO -->
      <nav class="navbar navbar-dark navbar-expand-md  bg-menu">

        <div class="container"> <!-- CONTAINER DO CABEÇALHO -->
          <!--LOGO INICIO -->
          <a href="index.html" class="navbar-brand"> <i class="fas fa-paw"></i> PetsWalks </a>
          <!-- LOGO FIM -->

          <!-- BOTÃO    "HAMBURGER PARA TELAS MENORES QUE MD" data-target = define oq quer abrir     -->
          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <i class="fas fa-bars text-white"></i>
          </button>
            <!--                                      ID DO BOTÃO HAMBURGUER -->
          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="index.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Quem Somos</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Dicas Pet</a>
              </li>

               <li class="nav-item">
                <a href="" class="nav-link"> <i class="fas fa-bone fa-rotate-90"></i></a>
              </li>

               <li class="nav-item dropdown"> <!-- <li> DROPDOWN: Esconder e Aparecer  -->
                <a href="" class="nav-link dropdown-toggle-split" data-toggle="dropdown">
               Entrar </a> <!-- DROPDOWN-TOGGLE: Aparecer a seta do "Sub-menu"  -->
                    <div class="dropdown-menu">
                      <!-- Listar itens do Dropdown"Sub-menu"-->
                        <a href="login.html" class="dropdown-item">Entrar</a>
                         <div class="dropdown-divider"></div>
                          <a href="cadastro.html" class="dropdown-item">Cadastrar</a>
                    </div>
              </li>
            </ul>
          </div>
      </nav>
    </header> <!-- CABEÇALHO FIM -->
    <br>

  <section>
    <div class="container">

      <div class="row">
        <div class="col-md-12 mb-5">
          <h1 class=" text-center font-weight-bold  display-4">Cadastre-se</h1>
          <div class="w-100"> </div>
          <hr>
           <!-- INICIO FORMULÁRIO -->
      <form>
      <form name="form1" action="cadastrosave.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="Nome" placeholder="Digite seu Nome Completo " maxlength="50" title="Informe seu nome" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCPF">CPF</label>
      <input type="text" class="form-control" name="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" id="inputCPF" placeholder="XXX.XXX.XXX-XX" maxlength="14" title="Informe seu CPF com ('.'' e '-')" required>

    </div>
       <div class="form-group col-md-3">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" name="CEP" placeholder="XXXXX-XXX" title="Digite os 5 primeiros digitos do CEP '-' os 3 ultimos " pattern="\d{5}-\d{3}" id="inputCEP"maxlength="9" required>
    </div>

  </div>

   <div class="form-row">
    <div class="form-group col-md-7">
      <label for="inputEndereco">Rua</label>
      <input type="text" class="form-control" id="inputEndereco" name="Endereco" placeholder="Digite o nome da sua rua " title="Informar nome da rua" maxlength="50" required>
    </div>
    <div class="form-group col-md-1">
      <label for="inputEnderecoNumero">Número</label>
      <input type="text" class="form-control" id="inputEnderecoNumero" name="NumeroEndereco" placeholder="Nº" title="Informar número da residencia" maxlength="5" required>
    </div>

     <div class="form-group col-md-4">
      <label for="inputBairro">Bairro</label>
      <input type="text" class="form-control" name="Bairro" id="inputBairro" placeholder="Digite seu Bairro" title="Informar nome do bairro que reside" maxlength="40" required>
    </div>
  </div>

  <div class="form-row">

     <div class="form-group col-md-3">
      <label for="inputTelefone">Telefone</label>
      <input type="text" class="form-control" name="Telefone" placeholder="Digite seu Telefone" id="inputTelefone" maxlength="11" pattern="[0-9]{11}" title="Informar número de telefone" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" name="NomeCidade" placeholder="Digite o nome da Cidade " id="inputCidade" title="Informar nome da Cidade" maxlength="40" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEstado">Estado</label>
      <select id="inputEstado" class="form-control" name="Estado" required>
        <option selected> Escolher</option>
        <option>AM</option>
        <option>BA</option>
        <option>CE</option>
        <option>DF</option>
        <option>GO</option>
        <option>MT</option>
        <option>MG</option>
        <option>RJ</option>
        <option>SP</option>
        <option>TO </option>
      </select>
    </div>

   
  </div>

  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" name="Email" id="inputEmail" placeholder="Digite seu email" maxlength="40" title="Informe um e-mail valido" required> <small class="text-muted">E-mail será validado</small>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Senha</label>
      <input type="password" class="form-control" name="Senha" id="inputPassword" placeholder="Senha"  maxlength="40"  required>
    </div>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required>
      <label class="form-check-label" for="gridCheck">
        Concordo com os termos e condições
      </label>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">
  <i class="fas fa-paw"></i> Cadastrar</button>
</form>
</div>
</section>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>