<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_imobiliaria";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
    $uf = mysqli_real_escape_string($conn, $_POST["uf"]);
    $cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
    $bairro = mysqli_real_escape_string($conn, $_POST["bairro"]);
    $tipoLogradouro = mysqli_real_escape_string($conn, $_POST["tipoLogradouro"]);
    $nomeLogradouro = mysqli_real_escape_string($conn, $_POST["nomeLogradouro"]);
    $numero = mysqli_real_escape_string($conn, $_POST["numero"]);
    $complemento = mysqli_real_escape_string($conn, $_POST["complemento"]);
    $descriçao = mysqli_real_escape_string($conn, $_POST["descriçao"]);
    $aluguelVenda = mysqli_real_escape_string($conn, $_POST["aluguelVenda"]);
    $preco = mysqli_real_escape_string($conn, $_POST["preco"]);
    

    
    $diretorio_imagens = "uploads/";
    $imagem_nome = basename($_FILES["imagem"]["name"]);
    $destino = $diretorio_imagens . $imagem_nome;
    
    
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $destino)) {
        
        $sql = "INSERT INTO imovel (uf, cidade, bairro, tipoLogradouro, nomeLogradouro, numero, complemento, descriçao, aluguelVenda, preco, imagem)
        VALUES ('$uf', '$cidade', '$bairro', '$tipoLogradouro', '$nomeLogradouro', '$numero', '$complemento', '$descriçao', '$aluguelVenda', '$preco', '$destino')";
        if (mysqli_query($conn, $sql)) {
            echo "Imóvel cadastrado com sucesso!";
        } 
    else {
            echo "Erro ao cadastrar o imóvel: " . mysqli_error($conn);
        }
    } 
  else {
        echo "Erro ao fazer upload da imagem.";
    }
}

mysqli_close($conn);
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de imóvel</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php include 'index.php'?>


    <h1 class="subTitulo">Cadastre seu imóvel</h1>


    <form class="formulario" method="POST" enctype="multipart/form-data">
        <label for="uf">Uf</label>
        <input type="text"id="uf" name="uf" required>
        <label for="cidade">Cidade</label>
        <input type="text"id="cidade" name="cidade" required>
        <label for="bairro">Bairro</label>
        <input type="text"id="bairro" name="bairro" required>
        <label for="tipoLogradouro">Tipo Logradouro</label>
        <input type="text"id="nome" name="tipoLogradouro" required>
        <label for="nomeLogradouro">Nome Logradouro</label>
        <input type="text"id="nomeLogradouro" name="nomeLogradouro" required>
        <label for="numero">Numero</label>
        <input type="text"id="numero" name="numero" required>
        <label for="complemento">complemento</label>
        <input type="text"id="complemento" name="complemento" required>
        <label for="descriçao">descrição</label>
        <input type="text"id="descriçao" name="descriçao" required>
        
        <select  id="aluguelVenda" name="aluguelVenda" required>
            <option value="aluguel">Alugar</option>
            <option value="venda">Vender</option>
        </select>
        
        <label for="preco">preço</label>
        <input type="text"id="preco" name="preco" required>
        <label for="imagem">Imagem do imóvel</label>
        <input type="file"id="imagem" name="imagem" required>
        <button type="submit">Cadastrar</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>