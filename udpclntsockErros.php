<?php
if (FALSE === ($sock_cliente = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)))
{
	echo "socket_create() Falhou: Causa: ".socket_strerror($sock_cliente)."\n";
}
if (FALSE === ($resultado = socket_bind($sock_cliente, '127.0.0.1', 9000)))
{
	echo "socket_bind() Falhou: Causa: ".socket_strerror($resultado)."\n";
}
$from ='';
$port = 0;
echo "Lado Cliente UDP -> A receber a msg..\n";
if (FALSE === ($receber = socket_recvfrom($sock_cliente, $buffer, 2048, 0, $from, $port)))
{
	echo "socket_recvfrom() Falhou: Causa: ".socket_strerror($receber)."\n";
}
echo "Mensagem recebida de $from na porta $port:\n $buffer";
socket_shutdown($sock_cliente,2);
socket_close($sock_cliente);
?>


