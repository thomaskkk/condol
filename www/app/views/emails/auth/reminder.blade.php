<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Lembrete de senha</h2>

		<div>
			Para redefinir sua senha, por favor, preencha este formulário: {{ URL::to('password/reset', array($resetCode)) }}.
		</div>
	</body>
</html>