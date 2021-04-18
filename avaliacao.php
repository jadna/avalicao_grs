<?php
    session_start();
    require('conexao.php');

    $query = "SELECT * FROM pois ORDER BY RAND() LIMIT 30";

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
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="navbar.css" rel="stylesheet">

        <style>
            .medio {
                width: 50%;
                margin-left: 400px;
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
                Dê a nota a pelo menos 10 pontos de interesse.</br>
                Avalie apenas os pontos de interesse que você já frequentou ou conhecer, atribuindo uma nota de 1 a 5, sendo 1 gostou pouco e 5 gostou muito.

            </p>
        </div>

        <div class="dropdown-divider" ></div>
        
        <div class="container-fluid">
            <div class="p-5 rounded justify-content-center">
                <form method="POST" action="rating.php">
                <?php
                    //Columns must be a factor of 12 (1,2,3,4,6,12)
                    $numOfCols = 3;
                    $rowCount = 0;
                    $bootstrapColWidth = 12 / $numOfCols;
                    foreach ($pois as $poi){
                        //var_dump($poi);
                        if($rowCount % $numOfCols == 0) { ?> <div class="row" style="margin-bottom: 25px"> <?php } 
                        $rowCount++;
                        $radio_button = "button".$rowCount;
                        $poiId = "poiId".$rowCount;
                        $rating = "rating".$rowCount;
                        $div_id = "div".$rowCount;
                ?>                       
                        <div id="div_ratings" class="col-md-<?php echo $bootstrapColWidth; ?>">
                            <div class="wrapper">
                                <h5 for=<?=$radio_button?> style="text-align:center"> <?=$poi['name']?></h5>
                                <label for=<?=$radio_button?>>Endereço: <?=$poi['endereco']?></label><br/>
                                <div id=<?=$div_id?> class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 15px; margin-left: 85px; margin-bottom: 10px;" center>
                                    <!--div class="btn-group mr-2" role="group" aria-label="First group"-->
                                        <button onclick="update(this.value, <?=$poi['poiId']?>, <?=$rowCount?>);" id=<?=$radio_button?> name=<?=$radio_button?> value="1" type="button" class="btn btn-outline-dark" data-toggle="button">1</button>
                                        <button onclick="update(this.value, <?=$poi['poiId']?>, <?=$rowCount?>);" id=<?=$radio_button?> name=<?=$radio_button?> value="2" type="button" class="btn btn-outline-dark">2</button>
                                        <button onclick="update(this.value, <?=$poi['poiId']?>, <?=$rowCount?>);" id=<?=$radio_button?> name=<?=$radio_button?> value="3" type="button" class="btn btn-outline-dark">3</button>
                                        <button onclick="update(this.value, <?=$poi['poiId']?>, <?=$rowCount?>);" id=<?=$radio_button?> name=<?=$radio_button?> value="4" type="button" class="btn btn-outline-dark">4</button>
                                        <button onclick="update(this.value, <?=$poi['poiId']?>, <?=$rowCount?>);" id=<?=$radio_button?> name=<?=$radio_button?> value="5" type="button" class="btn btn-outline-dark">5</button>
                                    <!--/div-->
                                </div>
                                <input type="hidden" name=<?=$poiId?> id=<?=$poiId?> value=<?=$poi['poiId'];?>>
                                <input type="hidden" name=<?=$rating?> id=<?=$rating?>>
                                    
                                <div class="footer">
                                    <span class="text"></span>
                                    <span class="numb"></span>
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php
                        if($rowCount % $numOfCols == 0) { ?> 
                        </div> 
                    <?php } 
                    } 
                    ?>
                    <button id="avaliar" type="submit" class="btn btn-dark btn-lg btn-block medio">Avaliar</button>
                    <!--button type="submit" style="margin-left: 500px;" class="btn btn-dark btn-lg btn-block" id="salvar" name="salvar">Salvar</button-->
                    
                </form>

            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
    
            /*const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const userId = urlParams.get('userId')
            document.querySelector("[id='userId']").value = userId;
            console.log(userId);*/

            function update(val, poi, idInput) {

                /** PEGA O EVENTO PELO ID DA DIV DEPOIS PEGA O VALOR DO BUTTON CLICADO E SETA NA VARIAVEL ESCONDIDA */

                var div = "#div"+idInput;
                $(div).on('click', 'button', function(event) {
                    console.log($(this).text())
                    var value = $(this).val();
                    var name_input = "rating"+idInput;
                    document.getElementById(name_input).value = value;
                    console.log(document.getElementById(name_input).value);

                });

               
                if(val != 0){
                    var id = "poiId"+idInput;
                    document.getElementById(id).value = poi;

                    /*var value_rating = "button"+idInput;
                    console.log(value_rating);
                    var num = null;*/
                 
                }                
            }   
        </script>

    </body>
</html>

  