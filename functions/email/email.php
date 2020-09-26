<?php
require_once 'iniSis.php';

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
        $mail->FromName = $dadosEmail['nome']."(".$dadosEmail['email'].")";
        $mail->AddAddress(MAILUSER /*$dadosEmail['email']*/);
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

function cadastrarEmail($dados) {
    $pdo = conectarBanco();
    try {
        $cadastrarEmail= $pdo->prepare("INSERT INTO contato (contato_nome, contato_email, contato_telefone, contato_assunto, contato_mensagem, contato_status)
                                        VALUES(?,?,?,?,?,?)");
        foreach ($dados as $k => $v):
            $cadastrarEmail->bindValue($k, $v);
        endforeach;

        $cadastrarEmail->execute();

        if ($cadastrarEmail->rowCount() == 1):
            return true;
        else:
            return false;
        endif;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
