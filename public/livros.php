<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo = 'titulo';
        $autor = 'autor';
        $classificacao = 'classificacao';
        /*TODO-1: Adicione uma variavel para cada coluna */
        $data_primeira_publicacao = 'data_primeira_publicacao';
        $categoria = 'categoria';
        $isbn = 'isbn';
        $paginas = 'paginas';
        $editora = 'editora';

        $sql =
            'SELECT ' . $titulo .
            '     , ' . $autor .
            '     , ' . $classificacao .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '     , ' . $data_primeira_publicacao .
            '     , ' . $categoria .
            '     , ' . $isbn .
            '     , ' . $paginas .
            '     , ' . $editora .
            '  FROM livros';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $titulo . '</th>' .
            '        <th>' . $autor . '</th>' .
            '        <th>' . $classificacao . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . $data_primeira_publicacao . '</th>' .
            '        <th>' . $categoria . '</th>' .
            '        <th>' . $isbn . '</th>' .
            '        <th>' . $paginas . '</th>' .
            '        <th>' . $editora . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$titulo] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    '<td>' . $registro[$classificacao] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$data_primeira_publicacao] . '</td>' .
                    '<td>' . $registro[$categoria] . '</td>' .
                    '<td>' . $registro[$isbn] . '</td>' .
                    '<td>' . $registro[$paginas] . '</td>' .
                    '<td>' . $registro[$editora] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>