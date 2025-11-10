@extends('layout')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-white">
    <div class="w-100" style="max-width: 600px;">
        <h3 class="text-center mb-4 fw-semibold">Add a New Recipe</h3>

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="form-label small text-muted">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0" 
                    value="{{ old('title') }}" 
                    required
                >
                @error('title')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label small text-muted">Ingredients</label>
                <textarea 
                    name="ingredients" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0" 
                    rows="3" 
                    required
                >{{ old('ingredients') }}</textarea>
                @error('ingredients')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label small text-muted">Instructions</label>
                <textarea 
                    name="instructions" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0" 
                    rows="3" 
                    required
                >{{ old('instructions') }}</textarea>
                @error('instructions')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label small text-muted">Image (optional)</label>
                <input 
                    type="file" 
                    name="image" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0"
                >
                @error('image')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-dark w-100 py-2 rounded-3">Save Recipe</button>
        </form>
    </div>
</div>
@endsection
