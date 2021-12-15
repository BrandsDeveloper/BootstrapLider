<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$cel = $_POST['number'];
$linha = $_POST['prod'];
$valor = $_POST['money'];
$cpf = $_POST['cpf'];
$autoriza = $_POST['autorizacao'];
$aceito = $_POST['politica'];
$acesso = $_POST['notificar'];


$to = "contato@atendimento.com";

$boundary = "XYZ-" . date("dmYis") . "-ZYX";
 $headers = "MIME-Version: 1.0\n";
 $headers.= "From: $email\n";
 $headers.= "Reply-To: $email\n";
 $headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
 $headers.= "$boundary\n";   

$corpo_mensagem = " 
<br>Formulário para Simulação <br>
<br>--------------------------------------------<br>
<br> <strong> Informações de Cadastro </strong> <br>
<br> <strong>Nome :</strong> $nome
<br> <strong>Email:</strong> $email
<br> <strong>Celular:</strong> $cel
<br> <strong>Produto:</strong> $linha
<br> <strong>Valor:</strong> $valor
<br> <strong>CPF:</strong> $cpf
<br> <strong>Autorizo a Líder:</strong> $autoriza
<br> <strong>Aceito os termos:</strong> $aceito
<br> <strong>Aceito receber:</strong> $acesso
<br> <br> <br>

Olá meu nome é $nome, Portador(a) do CPF: $cpf e fiquei interessado(a) no produto: $linha e gostaria de ver quanto ficaria um valor ou limite de: R$ $valor <br> <br>
Meu email é : $email e meu telefone é: $cel aguardo o contato <br> <br>

<strong> Veja abaixo se o cliente autorizou as opções </strong> <br>

O cliente $autoriza essa opção <br>
O cliente $aceito essa opção <br>
O cliente $acesso essa opção <br>

<br> <br>
Lembrando que se estiver (on) Ele aceitou, caso esteja (off) ele negou os termos e politicas da pagina.
<br><br>
";

$assunto = "Formulario do Site";

    $mensagem = "--$boundary\n";                                    // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
    $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
    $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
    $mensagem.= "$corpo_mensagem\n"; 
    $mensagem.= "--$boundary\n"; 
    $mensagem.= "Content-Type: ".$arquivo["type"]."\n";  
    $mensagem.= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";  
    $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
    $mensagem.= "$anexo\n";  
    $mensagem.= "--$boundary--\r\n"; 


if(mail($to, $assunto, $mensagem, $headers))
{
    echo "<br><br><center><b><font color='green'>Mensagem enviada com sucesso!";
    echo "<br><br><a href='contato.html'>Voltar para a página de formulário</a>";
} 
 else
 {
    echo "<br><br><center><b><font color='red'>Ocorreu um erro ao enviar a mensagem!";
}
?>


