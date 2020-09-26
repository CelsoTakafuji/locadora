<?php

require_once '../../../functions/iniSis.php';

function enviarEmail($dadosEmail) {

    if (is_array($dadosEmail)):
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->SMTPSecure = "tls";
        $mail->IsSMTP();
        $mail->Host = MAILHOST;
        $mail->Port = MAILPORT;
        $mail->SMTPAuth = true;
        $mail->Username = MAILUSER;
        $mail->Password = MAILPASS;
        $mail->IsHTML(true);
        $mail->SetFrom($dadosEmail['from']);
        $mail->From = $dadosEmail['from'];
        $mail->FromName = $dadosEmail['nome'];
        $mail->AddAddress($dadosEmail['email']);
        $mail->Subject = $dadosEmail['assunto'];
        $mail->Body = $dadosEmail['mensagem'];

        if ($mail->Send()) :
            return true;
        else :
            return false;
        endif;
    else:
        echo "Valor passado por parametro para a funcao email, tem que ser um array";
    endif;
}

function atualizarEmail($id) {
    $pdo = conectarBanco();
    try {
        $atualizarEmail= $pdo->prepare("update contato set contato_status = 2 where contato_id = ?");
        $atualizarEmail->bindValue(1, $id);
        $atualizarEmail->execute();

        if ($atualizarEmail->rowCount() == 1):
            return true;
        else:
            return false;
        endif;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function deletarEmail($id) {
    $pdo = conectarBanco();
    try {
        $deletarEmail= $pdo->prepare("delete from contato where contato_id = ?");
        $deletarEmail->bindValue(1, $id);
        $deletarEmail->execute();

        if ($deletarEmail->rowCount() == 1):
            return true;
        else:
            return false;
        endif;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}