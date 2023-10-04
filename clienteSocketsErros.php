<?php
# Código lado cliente via TCP
if (FALSE === ($sock_cliente = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)))
{
	echo "socket_create() Falhou: Causa: ".socket_strerror($sock_cliente)."\n";
}
if (FALSE === ($resultado = socket_connect($sock_cliente, '192.168.1.184', 9000)))
{
	echo "socket_connect() Falhou: Causa: ".socket_strerror($resultado)."\n";
}
echo "Eu sou o cliente | A receber a msg do servidor..\n";
Do
{
	if (FALSE === ($msg = socket_read($sock_cliente, 2048, PHP_NORMAL_READ)))
	{
		echo "socket_read() Falhou: Causa: ".socket_strerror($msg)."\n";
	}
	echo $msg;
}
While($msg!= "Mensagem terminada.\n");
socket_shutdown($sock_cliente, 2);
socket_close($sock_cliente);
?>


