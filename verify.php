<?php 
    session_start();
    include('conexao.php');
    
    //var_dump($_POST);

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['latitude']) && !empty($_POST['latitude']) && isset($_POST['longitude']) && !empty($_POST['longitude'])) {
        $email = $_POST['email'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        $query = "SELECT userId, email, latitude, longitude 
                    FROM users 
                    WHERE email LIKE '".$email."'".
                    " AND latitude LIKE '".$latitude."'".
                    " AND longitude LIKE '".$longitude."'";

        $result = $mysqli->query($query);

        if($result->num_rows > 0){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $errorMSG = 'Usuario já possui avaliação com essa latitude e longitude. </br>Por favor, insira uma nova localização!';
            echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
        }else{

           $sql = "INSERT INTO users (email, latitude, longitude) VALUES ('".$_POST['email']."', '".$_POST['latitude']."', '".$_POST['longitude']."')";
            $insert = $mysqli->query($sql);

            if ($insert === TRUE) {
                $msg = "Sucesso!";
                $idInserido = $mysqli->query("SELECT LAST_INSERT_ID()");
                $idInserido = $idInserido->fetch_array(MYSQLI_ASSOC);
                $idInserido = $idInserido['LAST_INSERT_ID()'];

                setcookie("user", $_POST['email']);
                setcookie("userId",$idInserido);

                // Se a sessão não existir, inicia uma
                // Salva os dados encontrados na sessão
                $_SESSION['userId'] = $idInserido;
                $_SESSION['user'] = $_POST['email'];

                echo json_encode(['code'=>200, 'msg'=>$msg, 'userId'=>$idInserido]);
                //Header("Location: avaliacao.php?userId=".$idInserido);
            } else {
                $errorMSG = 'Erro ao inserir os dados. Por favor tente novamente.';
                echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
            }

            

        }

    }

?>