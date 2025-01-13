<div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 text-sm">
        <div class="flex justify-end">
            <a href="{{ route('contracts.edit', $dbContract->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                <i class="fas fa-pen"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            <div><strong>Nº Processo:</strong> {{$dbContract->number_process_bidding}}</div>
            <div><strong>Nº Pregão:</strong> {{$dbContract->number_auction}}</div>
            <div><strong>Nº Registro de Preço:</strong> {{$dbContract->number_price_registration}}</div>
            <div><strong>Nº Ata de Preço:</strong> {{$dbContract->number_price_record_document}}</div>
            <div class="col-span-2 lg:col-span-4"><strong>Título:</strong> {{$dbContract->title}}</div>
            <div class="col-span-2 lg:col-span-4"><strong>Descrição:</strong> {{$dbContract->description}}</div>
            <div><strong>Data Início:</strong> {{ date('d/m/Y', strtotime($dbContract->start_date)) }} </div>
            <div><strong>Data Fim:</strong> {{ date('d/m/Y', strtotime($dbContract->end_date)) }} </div>
            <div><strong>Período:</strong> {{$dbContract->period}} Meses</div>
            <div><strong>Status:</strong> {{$dbContract->ContractStatus->title}}</div>
            <div><strong>Valor Total:</strong> {{$dbContract->total_price}}</div>
            <div><strong>Valor Solicitado:</strong> {{$dbContract->request_price}}</div>
            <div><strong>Saldo Restante:</strong> {{$dbContract->balance_price}}</div>
            <div class="col-span-4">
                <strong>Dotações Orçamentárias:</strong>
                <div class="space-y-1">
                    @foreach ($dbContract->FinancialBlocks as $FinancialBlock)
                        <div class="pl-5">{{ $FinancialBlock->title }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>   
</div>
