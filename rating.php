<?php

    include("conexao.php");
    if (!isset($_SESSION)) session_start();

    //print("<pre>".print_r($_SESSION,true)."</pre>");
    //print("<pre>".print_r($_POST,true)."</pre>"); die();

    $aux = 0;

    for($i=1; $i<=count($_POST); $i++){

        if(!empty($_POST['poiId'.$i]) && $_POST['rating'.$i] != 0){
            
            $dados[$aux]['poiId'] = $_POST['poiId'.$i];
            $dados[$aux]['rating'] = $_POST['rating'.$i];
            $aux++;     
        }
    }
 
    if(!$dados){
        echo"<script language='javascript' type='text/javascript'>
        alert('Você não avaliou nenhum ponto de interesse!');window.location
        .href='avaliacao.php';</script>";
    }

    //print("<pre>".print_r($dados,true)."</pre>"); die();
    
    foreach($dados as $data){

        $sql_user_rating = "SELECT * FROM ratings WHERE userId = ".$_SESSION['userId']. " AND poiId = ".$data['poiId'].";";
        $vericacao = $mysqli->query($sql_user_rating);

        if ($vericacao->num_rows == 0) {
            
            $sql = "INSERT INTO ratings(userId,poiId,rating) VALUES(".$_SESSION['userId'].",".$data['poiId'].",".$data['rating'].");";
            $resultado = $mysqli->query($sql);
            
            //echo "Error: " . $sql_user_rating . "<br>" . mysqli_error($mysqli);
        }else{
            $sql = "UPDATE ratings SET rating = ".$data['rating']." WHERE userId = ".$_SESSION['userId']." AND poiId = ".$data['poiId'];
            $resultado = $mysqli->query($sql);
        }
        
    }

    if ($resultado) {
        echo"<script language='javascript' type='text/javascript'>
            alert('Você finalizou a primeira parte do experimento: levantamento de preferências. Na segunda parte da avaliação você receberá um conjunto de recomendações para avaliação. Fique atento a seu e-mail. Entraremos em contato. Obrigado.');window.location
            .href='index.php';</script>";
        /*$msg = "Você finalizou a primeira parte do experimento: levantamento de preferências. Na segunda parte da avaliação você receberá um conjunto de recomendações para avaliação. Fique atento a seu e-mail. Entraremos em contato. Obrigado.";
        echo json_encode(['code'=>200, 'msg'=>$msg]);*/
    } else {

        /*echo"<script language='javascript' type='text/javascript'>
            alert('Erro ao salvar a avaliação');window.location
            .href='avaliacao.php';</script>";
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);*/
        $errorMSG = "Erro ao inserir os dados. Por favor tente novamente. Error: " . $sql;
        echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
    }

?>