<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('puplic.profile') }}
        </h2>
         <form method="GET" action="{{ route('setLocale') }}" class="d-inline">
              <select name="locale" onchange="this.form.submit()" class="form-select form-select-sm">
                      <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                       <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>عربي</option>
                 </select>
                        
        </form>
    </x-slot>
 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
