<h1>Relatório de Separação</h1>
<p>Processamento ID: {{ $warehouseProcessing->id }}</p>
<p>Data: {{ $warehouseProcessing->created_at->format('d/m/Y') }}</p>

<table>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dbWarehouseProcessingItems as $dbWarehouseProcessingItem)
            <tr>
                <td>{{ $dbWarehouseProcessingItem->WarehouseProduct->title }}</td>
                <td>{{ $dbWarehouseProcessingItem->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
