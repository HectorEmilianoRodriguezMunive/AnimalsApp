<x-filament-panels::page>
    <div class = "flex w-f h-f justify-center">
    
    <div class="p-6 space-y-4">


            <div class = "flex flex-col">
                    <h1 class="text-xl font-bold mb-4">Detalles</h1>
                    
                        {{$this->table}}
            </div>

            <div class = "flex flex-col">
                    <h2 class="text-xl font-bold">Cotización</h2>
                    <p><strong>Fecha:</strong> {{ $record->date_quote }}</p>
                    <p><strong>Subtotal:</strong> ${{ number_format($record->subtotal, 2) }}</p>
                    <p><strong>IVA:</strong> ${{ number_format($record->IVA, 2) }}</p>
                    <p><strong>Total:</strong> ${{ number_format($record->total, 2) }}</p>
                    <p><strong>Descripción:</strong> {{ $record->description }}</p>
                    <p><strong>Usuario:</strong> {{ $record->user->name }}</p>
            </div>
    </div>

</div>
</x-filament-panels::page>


