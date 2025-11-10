@extends('layout')

@section('content')
<div class="container py-5">
    <h2 class="fw-semibold text-center mb-5">All Recipes</h2>

    @if(session('success'))
        <div class="alert alert-success text-center small">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($recipes as $recipe)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 rounded-3 overflow-hidden">
                    @if($recipe->image)
                        <img src="{{ asset('storage/'.$recipe->image) }}" 
                             class="card-img-top" 
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-semibold mb-3">{{ $recipe->title }}</h5>

                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('recipes.show', $recipe->id) }}" 
                               class="btn btn-sm btn-dark flex-fill">View</a>

                            @auth
                                <form action="{{ route('recipes.destroy', $recipe->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Delete this recipe?');" 
                                      class="flex-fill">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger w-100">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5 text-muted">
                <p>No recipes found yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
