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
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <a class="navbar-brand">Rec Group POI</a>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="p-5 rounded justify-content-center">
       
        <!-- INFORMA SOBRE O EXPERIMENTO-->
        <div class="col-sm-6 mx-auto">
          <h1 style="text-align:center">Olá, seja bem-vindo(a)</h1>
          <p style="text-align:center">Este sistema é um experimento para o desenvolvimento do meu Mestrado em Ciência da Computação. Para mais informações</p>
          
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-dark" onclick="instrucoes();">Leia as instruções</button>
          </div>
        </div>

        <div class="dropdown-divider" ></div>
        
        <!-- FAZ A BUSCA DAS COORDENADAS-->
        <div class="col-sm-6 mx-auto">
          <p style="text-align:center">Para saber a sua coordenada geografica (latitude e longitude), você pode pesquisar através do endereço</p>        
          <div class="input-group">
            <input id="address" name="address" type="text" class="form-control" placeholder="Insira o endereço" aria-describedby="pesquisar">
            <button id="pesquisar" name="pesquisar" type="button" class="btn btn-outline-dark">Ir</button>
          </div>
      
        </div>
        </br>
        <div class="col-sm-6 mx-auto">
          <p style="text-align:center">Ou pode clicar no botão abaixo que a sua localização já será preenchida automaticamente (só precisa permitir no pop-up).</p>
          <div class="d-flex justify-content-center">
            <button id="btn" type="button" class="btn btn-dark" onclick="getLocation()">Localização</button>
          </div>
        </div>

        <div class="dropdown-divider"></div>
       
        <!-- FORM QUE INSERE O EMAIL E AS COORDENADAS-->
        <form id="cadastro" method="post" action="verify.php" onsubmit="return valida_form(this)">
          <div class="col-sm-6 mx-auto">
            <div class="row">
              <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email"  type="email" class="form-control" aria-describedby="emailHelp">
              </div>
            </div> </br>
            
            <div class="row">
              <div class="col-md-6">
                <label for="latitute" class="form-label">Latitude</label>
                <input id="latitude" name="latitude"  type="text" class="form-control" aria-describedby="emailHelp">
              </div>
              <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input id="longitude" name="longitude"  type="text" class="form-control" aria-describedby="emailHelp">
              </div>
            </div>

            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div></br>
            <div id="errorlabel" class="alert alert-danger display-error" style="display: none"></div>
            
            <div class="d-grid gap-2 ">
              <button name="submit" id="submit" type="submit" class="btn btn-dark">Enviar</button>
            </div> 
          </div>
        </form>
      </div>
    </div>
  

    <!--script src="../assets/dist/js/bootstrap.bundle.min.js"></script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
    <script type="text/javascript">
      function instrucoes() {
        window.location.href = 'instrucoes.php';
      }

      /**Verifica se os campos não estão vazios */
      $(document).ready(function() {
        $('#submit').click(function(e){
          e.preventDefault();

          var email = $("#email").val();
          var latitude = $("#latitude").val();
          var longitude = $("#longitude").val();

          if(email == "" || latitude == "" || longitude == ""){
            $(".display-error").html("<ul>Por favor, preencha todos os campos!</ul>");
            $(".display-error").css("display","block");
          }else{
            $.ajax({
                type: "POST",
                url: "verify.php",
                dataType: "json",
                data: {email:email, latitude:latitude, longitude:longitude},
                success : function(data){
                  console.log(data)
                  if (data.code == "200"){
                    //window.location.href='avaliacao.php?userId='+data.userId;
                    window.location.href='avaliacao.php';
                    //alert("Success: " +data.msg);
                  } else {
                      $(".display-error").html("<ul>"+data.msg+"</ul>");
                      $(".display-error").css("display","block");
                      //window.location.reload();
                  }
                }
            });
          }
        });

      
      /**Pesquisa a latitude e longitude de acordo as API do OpenStreetMap e GOOGLE */
      $('#pesquisar').click(function(e){
        e.preventDefault();
        const API_URL = 'https://nominatim.openstreetmap.org/search.php';
        const API_KEY = 'AIzaSyDvbS7BRsiO8qQ-ikl1cJ4q6THepBkiqL4';
        var address = $("#address").val();
        console.log(address);

        const doRequest = (url) => {
            const promisseCallback = (resolve, reject) => {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: resolve,
                    error: reject,
                });
            };
            return new Promise(promisseCallback);
        }

        const getApiUrl = (address) => {
            return `${API_URL}?q=${encodeURI(address)}&format=json`;
        }

        (async () => {
            const apiUrl = getApiUrl(address);
            const data = await doRequest(apiUrl);
            console.log(apiUrl);
            
            if (!data || data.error_message) {
                const message = (data && data.error_message) ? data.error_message : 'Api Error';
                console.log(message);
                return;
            }
            if(data.length == 0){
              const API_URL = 'https://maps.googleapis.com/maps/api/geocode/json';
              const API_KEY = 'AIzaSyDvbS7BRsiO8qQ-ikl1cJ4q6THepBkiqL4';
              console.log(address);

              const doRequest = (url) => {
                  const promisseCallback = (resolve, reject) => {
                      $.ajax({
                          url: url,
                          type: 'GET',
                          success: resolve,
                          error: reject,
                      });
                  };
                  return new Promise(promisseCallback);
              }

              const getApiUrl = (address) => {
                return `${API_URL}?key=${API_KEY}&address=${encodeURI(address)}`;
              }

              (async () => {
                const apiUrl = getApiUrl(address);
                const data = await doRequest(apiUrl);
                
                if (!data || data.error_message) {
                    const message = (data && data.error_message) ? data.error_message : 'Api Error';
                    console.log(message);
                    return;
                }
                
                console.log(data.results[0].geometry.location);
                document.querySelector("[id='latitude']").value = data.results[0].geometry.location.lat;
                document.querySelector("[id='longitude']").value = data.results[0].geometry.location.lng;

              })();
            
              }else{
                console.log(data[0]);
                console.log(data);
                document.querySelector("[id='latitude']").value = data[0].lat;
                document.querySelector("[id='longitude']").value = data[0].lon;
              }             
          })();             
        });
      });

      /** PEGA A LOCIZAÇÃO ATUAL DA PESSOA VIA BROWSER SE FOR PERMITIDO */
      var errorlabel = document.getElementById("error");
      function getLocation(){
        if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(showPosition,showError);
          console.log(navigator.geolocation);
        }
        else{
          errorlabel.innerHTML="Seu browser não suporta Geolocalização.";
        }
      }
      function showPosition(position){
        document.querySelector("[id='latitude']").value = position.coords.latitude;
        document.querySelector("[id='longitude']").value = position.coords.longitude;
      }
      function showError(error){
        switch(error.code){
          case error.PERMISSION_DENIED:
            errorlabel.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
            break;
          case error.POSITION_UNAVAILABLE:
            errorlabel.innerHTML="Localização indisponível."
            break;
          case error.TIMEOUT:
            errorlabel.innerHTML="A requisição expirou."
            break;
          case error.UNKNOWN_ERROR:
            errorlabel.innerHTML="Algum erro desconhecido aconteceu."
            break;
        }
      }
    </script>
  </body>
</html>
