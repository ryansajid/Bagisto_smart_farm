@extends('admin::layouts.index')

@section('page_title')
    {{ __('admin::app.cow.edit_cow') }} - {{ $cow->cow_id }}
@endsection

@section('content')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.cow.show', $cow->cow_id) }}" 
                   class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('admin::app.cow.edit_cow') }}
                    </h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        {{ __('admin::app.cow.edit_description') }}: {{ $cow->cow_id }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="p-6">
            <form method="POST" action="{{ route('admin.cow.update', $cow->cow_id) }}" enctype="multipart/form-data" class="max-w-2xl">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    {{ __('admin::app.cow.errors_occurred') }}
                                </h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="space-y-6">
                    <!-- Cow ID (Read-only) -->
                    <div>
                        <label for="cow_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('admin::app.cow.cow_id') }}
                        </label>
                        <input type="text" 
                               id="cow_id" 
                               name="cow_id" 
                               value="{{ $cow->cow_id }}" 
                               readonly
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white cursor-not-allowed">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ __('admin::app.cow.cow_id_readonly') }}
                        </p>
                    </div>

                    <!-- Breed -->
                    <div>
                        <label for="breed" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('admin::app.cow.breed') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="breed" 
                               name="breed" 
                               value="{{ old('breed', $cow->breed) }}"
                               required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                               placeholder="{{ __('admin::app.cow.breed_placeholder') }}">
                    </div>

                    <!-- Birth Date -->
                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('admin::app.cow.birth_date') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="birth_date" 
                               name="birth_date" 
                               value="{{ old('birth_date', $cow->birth_date ? $cow->birth_date->format('Y-m-d') : '') }}"
                               required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Weight -->
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('admin::app.cow.weight') }} (kg) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               id="weight" 
                               name="weight" 
                               value="{{ old('weight', $cow->weight) }}"
                               step="0.01"
                               min="0"
                               required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                               placeholder="{{ __('admin::app.cow.weight_placeholder') }}">
                    </div>

                    <!-- Health Status -->
                    <div>
                        <label for="health_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('admin::app.cow.health_status') }} <span class="text-red-500">*</span>
                        </label>
                        <select id="health_status" 
                                name="health_status" 
                                required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="healthy" {{ old('health_status', $cow->health_status) == 'healthy' ? 'selected' : '' }}>
                                {{ __('admin::app.cow.healthy') }}
                            </option>
                            <option value="at-risk" {{ old('health_status', $cow->health_status) == 'at-risk' ? 'selected' : '' }}>
                                {{ __('admin::app.cow.at_risk') }}
                            </option>
                            <option value="sick" {{ old('health_status', $cow->health_status) == 'sick' ? 'selected' : '' }}>
                                {{ __('admin::app.cow.sick') }}
                            </option>
                        </select>
                    </div>

                    <!-- Photo Upload -->
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('admin::app.cow.photo') }}
                        </label>
                        
                        @if($cow->photo)
                            <div class="mt-2 mb-4">
                                <img src="{{ asset('storage/' . $cow->photo) }}" 
                                     alt="{{ $cow->cow_id }}" 
                                     class="h-48 w-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('admin::app.cow.current_photo') }}
                                </p>
                            </div>
                        @endif

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-gray-400 dark:hover:border-gray-500 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label for="photo" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                        <span>{{ __('admin::app.cow.change_photo') }}</span>
                                        <input id="photo" name="photo" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">{{ __('admin::app.cow.or_drag_drop') }}</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ __('admin::app.cow.photo_help') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.cow.show', $cow->cow_id) }}" 
                           class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            {{ __('admin::app.cow.cancel') }}
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors">
                            {{ __('admin::app.cow.update_cow') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
