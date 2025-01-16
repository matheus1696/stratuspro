<div>
    <x-pages.conteiner class="text-sm">
        @if ($dbContract->status_id === $dbContractStatus->id)
            <div class="flex justify-end">
                <a href="{{ route('contracts.edit', $dbContract->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                    <i class="fas fa-pen"></i>
                </a>
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
            <div><strong>Nº Processo:</strong> {{$dbContract->number_process_bidding}}</div>
            <div><strong>Nº Pregão:</strong> {{$dbContract->number_auction}}</div>
            <div><strong>Nº Registro de Preço:</strong> {{$dbContract->number_price_registration}}</div>
            <div><strong>Nº Ata de Preço:</strong> {{$dbContract->number_price_record_document}}</div>
            <div class="lg:col-span-4"><strong>Título:</strong> {{$dbContract->title}}</div>
            <div class="lg:col-span-4"><strong>Descrição:</strong> {{$dbContract->description}}</div>
            <div><strong>Data Início:</strong> {{ date('d/m/Y', strtotime($dbContract->start_date)) }} </div>
            <div><strong>Data Fim:</strong> {{ date('d/m/Y', strtotime($dbContract->end_date)) }} </div>
            <div><strong>Período:</strong> {{$dbContract->period}} Meses</div>
            <div><strong>Status:</strong> {{$dbContract->ContractStatus->title}}</div>
            <div><strong>Valor Total:</strong> R$ {{ number_format($dbContract->total_price, 2, ',', '.') }} </div>
            <div><strong>Valor Solicitado:</strong> R$ {{ number_format($dbContract->request_price, 2, ',', '.') }} </div>
            <div><strong>Saldo Restante:</strong> R$ {{ number_format($dbContract->balance_price, 2, ',', '.') }} </div>
            <div class="lg:col-span-4">
                <strong>Dotações Orçamentárias:</strong>
                <div class="space-y-1">
                    @foreach ($dbContract->FinancialBlocks as $FinancialBlock)
                        <div class="pl-5">{{ $FinancialBlock->title }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-pages.conteiner>   
</div>
