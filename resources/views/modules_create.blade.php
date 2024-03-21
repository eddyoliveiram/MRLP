<x-app-layout>
    <x-card title="New Module" shadow separator>
        <form method="POST" action="{{ route('modules.store') }}" enctype="multipart/form-data">
            <input type="hidden" value="{{$course_id}}" name="course_id">
            @csrf
            @if (session('success'))
                <x-div-message>
                    {{ session('success') }}
                </x-div-message>
            @endif
            <div class="flex w-full space-x-4">
                <div class="w-1/4">
                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                      :value="old('name')"></x-text-input>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <div class="flex w-full mt-4 space-x-4">
                <x-primary-button>
                    <i class="fas fa-save"></i>&nbsp;Save
                </x-primary-button>
                <x-secondary-button onclick="history.back()">
                    <i class="fas fa-circle-arrow-left"></i>&nbsp;Back
                </x-secondary-button>
            </div>
        </form>
    </x-card>
</x-app-layout>
