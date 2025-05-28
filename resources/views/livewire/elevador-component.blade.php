<div>
    <h2>Andar atual: {{ $andarAtual }}</h2>

    <input type="number" wire:model="andar" min="0" />
    <button wire:click="chamarElevador">Chamar Elevador</button>
    <button wire:click="moverElevador">Mover para andar</button>

    <p>{{ $mensagem }}</p>

    <h4>Chamados Pendentes:</h4>
    <ul>
        @foreach($pendentes as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
