<?php
    // Conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Obter os dados do QR Code
    $content = json_decode(file_get_contents('php://input'), true);

    // Verificar se o QR Code já está no banco de dados
    $query = "SELECT * FROM em_uso WHERE ID_Maquina = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $content['ID_Maquina']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Excluir linha correspondente do banco de dados
        $deleteQuery = "DELETE FROM em_uso WHERE ID_Maquina = ?";
        $deleteStmt = $conexao->prepare($deleteQuery);
        $deleteStmt->bind_param("s", $content['ID_Maquina']);
        $deleteStmt->execute();
    } else {
        // Adicionar informações do QR Code ao banco de dados
        $insertQuery = "INSERT INTO em_uso (ID_Maquina, Nome_Maquina, status) VALUES (?, ?, ?)";
        $insertStmt = $conexao->prepare($insertQuery);
        $insertStmt->bind_param("sss", $content['ID_Maquina'], $content['Nome_Maquina'], $content['Status']);
        $insertStmt->execute();

        // Adicionar registro à tabela de movimentação
        $diaSemana = date('N');
        $horario = date('H:i:s');
        $idCondominio = 1;  // Altere com o valor correto do ID do condomínio
        $idMaquina = $content['ID_Maquina'];  // Use o ID da máquina do QR Code
        $movimentacaoQuery = "INSERT INTO movimentacao (ID_Condominio, ID_Maquina, Nome_Maquina, Dia, Horario) VALUES (?, ?, ?, ?, ?)";
        $movimentacaoStmt = $conexao->prepare($movimentacaoQuery);
        $movimentacaoStmt->bind_param("sssss", $idCondominio, $idMaquina, $content['Nome_Maquina'], $diaSemana, $horario);
        $movimentacaoStmt->execute();
    }
    $conexao->close();
    exec("python gerarcds.py", $output, $return);

    // Verificar se a execução foi bem-sucedida
    if ($return == 0) {
        echo "Códigos QR gerados com sucesso.";
    } else {
        echo "Houve um problema ao gerar os códigos QR.";
    }
?>
