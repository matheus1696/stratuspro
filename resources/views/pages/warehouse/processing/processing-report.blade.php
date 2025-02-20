<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Relatório de Solicitação</title>

    <style>
        @page {
            margin: 0;
        }

        body {
            background: url('assets/img/timbrado.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif; /* Adicione uma fonte padrão */
            margin: 0; /* Remova margens padrão */
            padding-top: 120px;
            padding-bottom: 100px;
        }

        .container {
            max-width: 800px; /* Largura máxima */
            margin: 0 50px; /* Centraliza o container */
            border-radius: 8px; /* Cantos arredondados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra */
        }

        h1 {
            font-size: 24px; /* Tamanho do título */
            font-weight: bold; /* Negrito */
            color: #4A4A4A; /* Cor do título */
            margin-bottom: 0; /* Espaço abaixo do título */
            text-align: center; /* Centraliza o título */
        }

        h2 {
            font-size: 16px; /* Tamanho do subtítulo */
            color: #4A4A4A; /* Cor do subtítulo */
            margin-bottom: 40px; /* Espaço abaixo do título */
            text-align: center; /* Centraliza o subtítulo */
        }

        .info div {
            margin-top: 10px; /* Remove margens */
            color: #333; /* Cor do texto */
        }

        .info p {
            margin: 0px; /* Remove margens */
            color: #333; /* Cor do texto */
        }
        table {
            width: 100%; /* Tabela ocupa 100% da largura */
            border-collapse: collapse; /* Remove espaçamento entre células */
            margin-top: 20px; /* Espaço acima da tabela */
        }

        th, td {
            border: 1px solid #ccc; /* Borda nas células */
            padding: 8px; /* Espaçamento interno */
            text-align: center; /* Alinhamento à esquerda */
        }

        th {
            background-color: #004B43; /* Cor de fundo dos cabeçalhos */
            color: #FFF;
        }

        .signature {
            margin-top: 40px; /* Espaço acima da seção de assinatura */
            text-align: center; /* Centraliza a assinatura */
        }

        .signature div {
            margin: 32px; /* Espaço acima da seção de assinatura */
            text-align: center; /* Centraliza a assinatura */
        }

        .signature p {
            font-size: 12px;
            margin: 4px; /* Espaço acima da seção de assinatura */
            text-align: center; /* Centraliza a assinatura */
        }

        .footer {
            text-align: center; /* Centraliza o rodapé */
            font-size: 12px; /* Tamanho da fonte do rodapé */
            color: #666; /* Cor do texto do rodapé */
            margin-top: 20px; /* Espaço acima do rodapé */
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Cabeçalho -->
        <h1>Relatório de Entrega</h1>

        <!-- Número da Solicitação em destaque -->
        <h2>Solicitação Nº {{ str_pad($warehouseProcessing->ticket, 6, '0', STR_PAD_LEFT) }}</h2>

        <!-- Detalhes da Solicitação -->
        <div class="info">
            <div>
                <span><strong>Data da Solicitação:</strong></span>
                <span>{{ $warehouseProcessing->created_at->format('d/m/Y H:i') }}</span>
            </div>            
            <div>
                <span><strong>Unidade:</strong></span>
                <span>{{ $warehouseProcessing->CompanyEstablishment->title }}</span>
            </div>
        </div>

        <!-- Tabela de Produtos -->
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dbWarehouseProcessingItems as $dbWarehouseProcessingItem)
                    <tr>
                        <td>{{ $dbWarehouseProcessingItem->WarehouseProduct->title }}</td>
                        <td class="text-center">{{ $dbWarehouseProcessingItem->quantity }}</td>
                        <td class="text-center"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Seção de Assinatura -->
        <div class="signature">
            <h3>Recebimento</h3>
            <div>
                <p>________________________________________</p>
                <p>Assinatura</p>
            </div>
            <div>
                <p>________________________________________</p>
                <p>Nome do Legível</p>
            </div>
            <div>
                <p>________________________________________</p>
                <p>Matrícula</p>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="footer">
            <p>Gerado em: {{ now()->format('d/m/Y H:i') }}</p>
            <p>Sistema de Gestão de Almoxarifado - StratusPro</p>
        </div>
    </div>

</body>

</html>
