<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Executar SQL no Banco de Dados</title>
</head>

<body>
    <form method="post" action="">
        <label for="sql_query">Script SQL:</label><br>
        <textarea id="sql_query" name="sql_query" rows="10" cols="50" required></textarea><br>
        <button type="submit">Executar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Configurações de conexão
        $host = 'drupal-postgres.institucional-drupal-ma-dev.svc.cluster.local';
        $dbname = 'drupal-database';
        $user = 'drupal-user';
        $password = 'drupal-pass';

        try {
            // Conectar ao banco de dados
            $dsn = "pgsql:host=$host;dbname=$dbname";
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            // Obter o script SQL do formulário
            $sql = $_POST['sql_query'];

            // Executar o script SQL
            $pdo->exec($sql);

            echo "Script SQL executado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao executar o script SQL: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>