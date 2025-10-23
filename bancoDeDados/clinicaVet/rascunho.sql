SELECT nomecliente,cidade,estado FROM cliente
WHERE estado LIKE 'sp'



SELECT nomecliente,cidade,estado FROM cliente
WHERE nomeCliente LIKE  'a%'&& estado = 'sp'||nomeCliente LIKE  'a%'&& estado ='rj' 



SELECT nomecliente,cidade,estado,celular FROM cliente
WHERE nomeCliente LIKE  'f%' and estado = 'sp'||nomeCliente LIKE  'f%' and estado ='rj'||nomeCliente LIKE  'f%' and estado ='mg' ||nomeCliente LIKE  'f%' and estado ='es' 



SELECT nomecliente,cidade,celular,tipologradouro,complemento FROM cliente
WHERE complemento IS NULL ||complemento LIKE 'f%'||complemento LIKE 'cas%'
ORDER BY nomeCliente



SELECT nomecliente,cidade,estado,celular,tipologradouro FROM cliente
WHERE estado = 'sp'&&tipologradouro='avenida'
ORDER BY nomeCliente





estado IN ('ps','sp')