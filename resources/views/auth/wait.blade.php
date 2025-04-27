<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex items-center justify-end mt-4">
            <h3 class="text-white">Дождитесь, пока администратор организации откроет Вам доступ. Вы можете выйти из данной учетной записи, чтобы зайти в другую.</h3>
            <x-primary-button class="ms-4">
                Выход
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
