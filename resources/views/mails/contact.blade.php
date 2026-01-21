<!DOCTYPE html>
<html>

<head>
    <title>Novo Contato</title>
</head>

<body>
    <h2>Detalhes do Contato</h2>
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    @if(isset($data['phone']) && $data['phone'] != '')
    <p><strong>Telefone:</strong> {{ $data['phone'] }}</p>
    @endif
    <p><strong>Assunto:</strong> {{ $data['subject'] }}</p>
    <p><strong>Mensagem:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>

</html>