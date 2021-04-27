<?php
    session_start();
    require('conexao.php');

    //$query = "SELECT * FROM pois ORDER BY RAND() LIMIT 50";
    $query = "SELECT * FROM pois";

    $result = $mysqli->query($query);
    //var_dump($result->num_rows);

    if($result->num_rows > 0){
        for($i=0; $i < $result->num_rows; $i++){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $pois[] = [
                'poiId' => $row['poiId'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'name' => $row['name'],
                'preference' => $row['type'],
                'endereco' => $row['address']
            ];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="generator" content="Hugo 0.82.0">
        <title>Rec Group POI</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbars/">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <!-- Bootstrap core CSS -->
        <!--link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="navbar.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />


        <style>
            .medio {
                width: 50%;
                margin-left: 400px;
            }        
            .range-wrap {
                position: relative;
                margin: 0 auto 3rem;
            }
            .range {
                width: 100%;
            }
            .bubble {
                background: red;
                color: white;
                padding: 4px 12px;
                position: absolute;
                border-radius: 4px;
                left: 50%;
                transform: translateX(-50%);
            }
            .bubble::after {
                content: "";
                position: absolute;
                width: 2px;
                height: 2px;
                background: red;
                top: -1px;
                left: 50%;
            }         
        </style>     
    </head>

    <body>

        <!-- MENU -->
        <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
            <div class="container-fluid">
                <a class="navbar-brand">Rec Group POI - Avaliação dos Pontos de Interesse</a>
                <label class="navbar-brand">Olá, <?=$_SESSION['user'];?></label>
            </div>
        </nav>
        
        <!-- CORPO -->
        <div class="col-sm-6 mx-auto">
            <h1 style="text-align:center">Instruções de Avaliação</h1>
            <p style="text-align:center">
                Esta seleção possui 50 pontos de interesse. Dê a nota em pelo menos 10 pontos de interesse.</br>
                Avalie apenas os pontos de interesse que você já frequentou e/ou conhece, atribuindo uma nota de 1 a 5, sendo 1 gostou pouco e 5 gostou muito.

            </p>
        </div>

        <div class="dropdown-divider" ></div>
        
        <div class="container-fluid">
            <div class="p-5 rounded justify-content-center">
                <form id="avaliacao" method="POST" action="rating.php">
                <?php
                    //Columns must be a factor of 12 (1,2,3,4,6,12)
                    $numOfCols = 3;
                    $rowCount = 0;
                    $bootstrapColWidth = 12 / $numOfCols;
                    foreach ($pois as $poi){
                        if($rowCount % $numOfCols == 0) { 
                ?> <div class="row" style="margin-bottom: 25px"> 
                <?php   } //Fecha o if
                        $rowCount++;
                        $nameinput = "rating".$rowCount;
                        $poiId = "poiId".$rowCount;
                        $label = 'label'.$rowCount;

                ?>                       
                        <div id="div_ratings" class="col-md-<?php echo $bootstrapColWidth; ?>">
                           
                            <h5 style="text-align:center"> <?=$poi['name']?></h5> 
                            <label>Tipo: <?=$poi['preference']?></label><br/>
                            <label>Endereço: <?=$poi['endereco']?></label><br/>

                            <div class="range-wrap"  style="width: 55%;">
                                    <input type="range" class="range" min="0" max="5" step="1" value="0" id=<?=$nameinput?> name=<?=$nameinput?> >
                                    <output class="bubble" style="margin-top:20px;"></output>
                            </div>

                            <input type="hidden" name=<?=$poiId?> id=<?=$poiId?> value=<?=$poi['poiId']?>>

                        </div>
                    <?php
                        if($rowCount % $numOfCols == 0) { ?> 
                        </div> 
                    <?php } 
                    } 
                    ?>
                    <button name="avaliar" id="avaliar" type="submit" class="btn btn-dark btn-lg btn-block medio">Avaliar</button>
                    <!--button type="submit" style="margin-left: 500px;" class="btn btn-dark btn-lg btn-block" id="salvar" name="salvar">Salvar</button-->
                    
                </form>

            </div>
        </div>

        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
    
            /*function getIdPoi(val, poi, idInput) {

                console.log(val);
              
                if(val != 0){
                    var id = "poiId"+idInput;
                    document.getElementById(id).value = poi;

                    /*var value_rating = "button"+idInput;
                    console.log(value_rating);
                    var num = null;
                 
                }                
            } */  

            const allRanges = document.querySelectorAll(".range-wrap");
            allRanges.forEach(wrap => {
                const range = wrap.querySelector(".range");
                const bubble = wrap.querySelector(".bubble");

                range.addEventListener("input", () => {
                    setBubble(range, bubble);
                });
                setBubble(range, bubble);
            });

            function setBubble(range, bubble) {

                const val = range.value;
                const min = range.min ? range.min : 0;
                const max = range.max ? range.max : 100;
                const newVal = Number(((val - min) * 100) / (max - min));
                bubble.innerHTML = "Nota: "+val;

                // Sorta magic numbers based on size of the native UI thumb
                bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
            }
            
            $("#avaliacao").submit(function() {

                var dados = jQuery(this).serialize();
                console.log(dados);
                var confirmacao = confirm("Por favor, confirme a avaliação!")
                console.log(confirmacao);
                if (confirmacao == true){

                    $.ajax({
                        type: "POST",
                        url: "rating.php",
                        dataType: "json",
                        data: dados,
                        success : function(data){
                            console.log(data)
                            if (data.code == "200"){
                                alert(data.msg);
                                window.location.href='index.php';
                            }else if(data.code == "402"){
                                alert(data.msg);
                            }else{
                                alert(data.msg);
                                window.location.href='index.php';
                            }
                        }
                    });
                    return true;
                } 
                else return false;       
            });
               

        </script>

    </body>
</html>

  