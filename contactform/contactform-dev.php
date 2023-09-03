<?php
$to      = 'contato@email.com';
$headers = "From: Nome do email <contato@email.com>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$doctor = $_POST['doctor'];
$subject  =  "Agendar consulta com " . $_POST['doctor'] ;
$senderEmail  =  $_POST['email'] ;
$senderName  =  $_POST['nome'];
$senderFone  =  preg_replace("/[^0-9]/","", $_POST['fone']);
$senderMsg  =  $_POST['msg'];

$message = <<<HTML
                <div style="font-size:15px; color:#787878; padding: 15px; font-family:Times New Roman, Times, serif;">
                    <div style="font-size:25px; color:#d97204; padding: 10px 0 10px 0">Não responder esse email</div>
                    <br>
                    
                    <b>Agendamento para:</b> $doctor  <br>
                    <b>Nome:</b> $senderName<br>
                    <b>E-mail:</b> <a href="mailto:$senderEmail" subject="$subject" >$senderEmail</a><br>
                    <b>Telefone:</b> $senderFone | <a href="https://api.whatsapp.com/send?phone=55$senderFone" target="_blank">whastsapp</a><br>
                    <br><b>Mensagem: </b><br> 
                    <p style="width: 400px; text-indent: 30px; ">
                    <pre>$senderMsg</pre>
                    </p><br>
                    -- Agendamento via site (vivenzacentromedico.com.br)
                    <br>
                    <br>
                    --Automação <br><img src="sualogo.png" width="246" >
                </div>  
            HTML;


            try {
              $retorno =  mail($to, $subject, $message, $headers);
				 echo "<script>alert('Obrigado pelo seu contato! Em breve retornaremos. ');	window.location.reload();</script>";

            } catch (\Throwable $th) {
				echo  "<script>alert('Desculpe, ocorreu um erro durante o processamento. Por favor, tente novamente mais tarde.');</script>";
            }
