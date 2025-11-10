@extends('layout')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-white">
    <div class="w-100" style="max-width: 700px;">
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            @if($recipe->image)
                <img 
                    src="{{ asset('storage/'.$recipe->image) }}" 
                    alt="{{ $recipe->title }}" 
                    class="card-img-top" 
                    style="height: 350px; object-fit: cover;"
                >
            @endif

            <div class="card-body">
                <h2 class="fw-semibold mb-3">{{ $recipe->title }}</h2>

                <div class="mb-3">
                    <h6 class="text-uppercase text-muted small fw-semibold mb-2">Ingredients</h6>
                    <p class="mb-0" style="white-space: pre-line;">{{ $recipe->ingredients }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="text-uppercase text-muted small fw-semibold mb-2">Instructions</h6>
                    <p style="white-space: pre-line;">{{ $recipe->instructions }}</p>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('recipes.index') }}" class="btn btn-outline-dark px-4">← Back</a>

                    @auth
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Delete this recipe?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger px-4">Delete</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
