<x-filament-panels::page>

    
            <div class = "flex flex-col w-full">
                    <h1 class="text-xl font-bold mb-4">Detalles</h1>
                    
                        {{$this->table}}
            </div>

            <div class = "flex gap-10 items-center w-full">
                    <p><strong>Date:</strong> {{ $record->date_quote }}</p>
                    <p><strong>Subtotal:</strong> ${{ number_format($record->subtotal, 2) }}</p>
                    <p><strong>IVA:</strong> ${{ number_format($record->IVA, 2) }}</p>
                    <p><strong>Total:</strong> ${{ number_format($record->total, 2) }}</p>
                    <p><strong>Description:</strong> {{ $record->description }}</p>
                    <p><strong>Client:</strong> {{ $record->user->name }}</p>
            </div>


</x-filament-panels::page>


