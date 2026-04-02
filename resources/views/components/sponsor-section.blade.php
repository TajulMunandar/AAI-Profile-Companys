<div class="sponsor-section">
    <div class="container">
        <div class="slider sponsor-carousel nav-style">
            @php
                $clients = \App\Models\Client::all();
            @endphp
            @forelse($clients as $client)
            <div class="sponsor-item">
                <a href="{{ $client->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('storage/' . $client->photo) }}" alt="{{ $client->name }}">
                </a>
            </div>
            @empty
            {{-- Fallback to default sponsors if no clients exist --}}
            @foreach($sponsors ?? [] as $sponsor)
            <div class="sponsor-item">
                <img src="{{ asset($sponsor['image'] ?? 'assets/img/sponsor-1.png') }}" alt="sponsor">
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</div><!-- ./ sponsor-section -->
