@extends('layouts.admin')
@section('page-title', 'Edit Equipment')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.equipment.index') }}" class="text-sm text-emerald-600 hover:underline mb-6 block">← Back to Equipment</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-6">Edit: {{ $equipment->name }}</h2>
        @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 text-sm">
                <ul class="list-disc pl-4 space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.equipment.update', $equipment) }}" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $equipment->name) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sport Type</label>
                <input type="text" name="sport_type" value="{{ old('sport_type', $equipment->sport_type) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('description', $equipment->description) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price Per Unit (RM)</label>
                    <input type="number" step="0.01" min="0" name="price_per_unit" value="{{ old('price_per_unit', $equipment->price_per_unit) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity Available</label>
                    <input type="number" min="0" name="quantity_available" value="{{ old('quantity_available', $equipment->quantity_available) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 rounded-lg transition">Update Equipment</button>
        </form>
    </div>
</div>
@endsection
