<?php

// Incluir o arquivo de conexão
require_once __DIR__ . '/../db/connection.php';

try {
    // Conectar ao banco de dados
    $pdo = conectarBancoDados();
    if (!$pdo) {
        throw new PDOException("Erro ao conectar ao banco de dados");
    }
    $query_events = "SELECT * FROM event_notes";
    $result_events = $pdo->prepare($query_events);
    $result_events->execute();

    // Inicializar um array para armazenar os eventos
    $eventos = array();

    // Iterar sobre os resultados e armazenar os eventos no array
    while ($row_events = $result_events->fetch(PDO::FETCH_ASSOC)) {
        $eventos[] = array(
            'id' => $row_events['event_id'],
            'title' => $row_events['event_title'],
            'color' => $row_events['event_color'],
            'start' => $row_events['event_start'],
            'end' => $row_events['event_end']
        );
    }

    // Codificar o array de eventos em JSON e exibir
    echo json_encode($eventos);
} catch (PDOException $e) {
    // Se ocorrer algum erro durante a conexão, exibir a mensagem de erro
    echo "Erro de conexão: " . $e->getMessage();
}
