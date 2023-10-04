<?php
if (FALSE ===($sock_servidor = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)))
{
	echo "socket_create() Falhou: Causa: ".socket_strerror($sock_servidor)."\n";
}
if (FALSE === ($resultado = socket_bind($sock_servidor, '127.0.0.1', 9000)))
{
	echo "socket_bind() Falhou: Causa: ".socket_strerror($resultado)."\n";
}
echo "Lado Servidor -> A enviar a msg..";
Do
{
	if (FALSE ===($resultado = socket_listen($sock_servidor, 1)))
	{
		echo "socket_listen() Falhou: Causa: ".socket_strerror($resultado)."\n";
	}
	if (FALSE ===($sock_cliente = socket_accept($sock_servidor)))
	{
		echo "socket_accept() Falhou: Causa: ".socket_strerror($sock_cliente)."\n";
	}
	$msg = "Mensagem via Socket!\nEsta mensagem tem mais do que uma linha.\nMensagem terminada.\n";
	if (FALSE === ($sock_write = socket_write($sock_cliente, $msg, strlen($msg))))
	{
		echo "socket_write() Falhou: Causa: ".socket_strerror($sock_write)."\n";
	}
}
While(true);
socket_shutdown($sock_servidor, 2);
socket_close($sock_servidor);
?>

