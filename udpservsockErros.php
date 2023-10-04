<?php
if (FALSE === ($sock_servidor = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)))
{
	echo "socket_create() Falhou: Causa: ".socket_strerror($sock_servidor)."\n";
}
if (FALSE === ($resultado = socket_bind($sock_servidor, '192.168.1.184', 9000)))
{
	echo "socket_bind() Falhou: Causa: ".socket_strerror($resultado)."\n";
}
$buffer = "Socket em UDP! | José Carlos Pereira da Silva\n";
echo "Lado Servidor UDP -> A enviar a msg..\n";
Do
{
	if (FALSE === ($enviar = socket_sendto($sock_servidor, $buffer, strlen($buffer), 0, '192.168.1.75', 9000)))
	{
		echo "socket_sendto() Falhou: Causa: ".socket_strerror($enviar)."\n";
	}
	echo "enviou: $enviar\n";
}
While(True);
socket_shutdown($sock_servidor,2);
socket_close($sock_servidor);
?>

