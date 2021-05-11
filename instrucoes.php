<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Rec Group POI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbars/">

    <!-- Bootstrap core CSS -->
    <!--link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="navbar.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    

    
  </head>
  <body>
    <!-- MENU -->
    <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Rec Group POI</a>
      </div>
    </nav>

      <div class="container-fluid">
            <div class="p-5 rounded justify-content-center">
            
                  <!-- INFORMA SOBRE O EXPERIMENTO-->
                  <div class="col-sm-6 mx-auto">
                        <h1 style="text-align:center">Olá, seja bem-vindo(a)</h1>
                        <p style="text-align:justify">
                              Eu me chamo Jadna Almeida e sou aluna do curso de Mestrado do <a href="http://wiki.dcc.ufba.br/PGComp/">Programa de Pós-Graduação em Ciência da Computação (PGCOMP)</a> da <a href="http://wiki.dcc.ufba.br/DCC/">Universidade Federal da Bahia-UFBA</a>. 
                              Primeiramente, seja bem-vindo(a) e muito obrigado pela sua disponibilidade em participar deste experimento. 
                              Será uma satisfação te ter como voluntário, saiba que sua avaliação é muito importante.
                        </p>
                  </div>

                  <div class="dropdown-divider" ></div>
            
                  <!-- INFORMA SOBRE O EXPERIMENTO-->
                  <div class="col-sm-6 mx-auto">
                        <h1 style="text-align:center">O que é o sistema</h1>
                        <p style="text-align:justify">
                              Neste trabalho estamos desenvolvendo um Sistema de Recomendação de Pontos de Interesse (POI) para Grupos. 
                              Pontos de Interesse podem ser bares, restaurantes, museus, parques, monumentos, locais de atrações turísticas na cidade, praias, eventos, etc. <br/>
                              Tais recomendações se baseiam nas preferências dos grupos de usuários e sua localização geográfica, logo o objetivo mor é recomendar POIs que estejam geograficamente mais próximos do grupo que atendam seus interesses simultaneamente.
                        </p>
                  </div>

                  <div class="dropdown-divider"></div>

                  <!-- INFORMA SOBRE O EXPERIMENTO-->
                  <div class="col-sm-6 mx-auto">
                        <h1 style="text-align:center">Instruções</h1>
                        <p style="text-align:justify">
                              <ol>
                                    <!--li style="text-align: justify;">Acesse o link <a href="#avaliacao">da avaliação</a> e cadastre seus dados pessoais, como nome e e-mail. Essas informações serão utilizadas para futuro contato. Após o experimento, essas informações serão apagadas da base de dados.</li-->
                                    <li style="text-align: justify;">Acesse a página <a href="index.php">da avaliação</a> e insira seu e-mail. Essas informações serão utilizadas para futuro contato. Após o experimento, essas informações serão apagadas da base de dados.</li>
                                    <li style="text-align: justify;">Informe sua posição geográfica (latitude e longitude), clicando no botão "Clique aqui para obter sua latitude e longitude".</li>
                                    <li style="text-align: justify;">Após inserir o email e a coordenada, você será rederecionado(a) para a página de avaliações. Avalie pelo menos 10 pontos de interesse que você conheça e/ou já tenha visitado.<br/>
                                    Atribuindo notas de 1 a 5 (onde 1 indica que não gostou daquele local e 5 você gostou muito). Locais não visitados não precisam ser avaliados. 
                                    <BR/>APÓS AVALIAR OS PONTOS DE INTERESSE NÃO ESQUEÇA DE CLICAR EM "AVALIAR"!</li>
                                    <li style="text-align: justify;">Após as coletas de dados, serão feitas as recomendações, então você e seu GRUPO receberá um link com as recomendações de pontos de interesse onde terão que avaliar as recomendações geradas em grupo.</li>
                                    <!--li style="text-align: justify;">Para cada item de recomendação, avalie com notas de 1 a 5 (onde 1 indica que não gostou daquele local e 5 você gostou muito).</li>
                                    <li style="text-align: justify;">Após as coletas de dados, você receberá um e-mail  com as recomendações de pontos de interesse a partir das informações providas nos itens 3 e 4. Para cada item de recomendação, avalie com notas de 1 a 5 (onde 1 indica discorda totalmente, e 6 que concorda totalmente).</li-->
                              </ol>
                        </p>
                  </div>

                  <div class="dropdown-divider"></div>

                  <!-- INFORMA SOBRE O EXPERIMENTO-->
                  <div class="col-sm-6 mx-auto">
                        <h1 style="text-align:center">Caso tenha alguma dúvida</h1>
                        <p style="text-align:justify">
                              Ou se algo não tenha ficado claro e/ou até mesmo se estiver enfrentando algum problema com o experimento, por favor entre em contato comigo <a href="mailto:jadna.ac@gmail.com">jadna.ac@gmail.com</a>.
                        </p>
                  </div>
            

            </div>
    </div>
  

    <!--script src="../assets/dist/js/bootstrap.bundle.min.js"></script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
  </body>
</html>
