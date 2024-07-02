@extends('layout')

@section('content')
<section class="section">
    <div class="cabinet paper">
        <h2 class="cabinet__title">Личный кабинет</h2>
        <div class="cabinet__fields">
            <form
                class="cabinet__field"
                id="js-cabinet-form-name"
                method="post"
                action="{{ URL::route('edit.name') }}"
            >
                @csrf
                <p class="cabinet__field__title">Ваше имя</p>
                <input
                    class="cabinet__field__input"
                    id="js-cabinet-input-name"
                    value="{{ $user->name }}"
                    name="name"
                >
                <button
                    class="button"
                    id="js-cabinet-button-name"
                    disabled
                >Изменить</button>
            </form>
            <div class="cabinet__field">
                <p class="cabinet__field__title">Ваш email</p>
                <p class="cabinet__field__value">{{ $user->email }}</p>
            </div>
        </div>
    </div>
    @if(session('success'))
        @include('message', ['content' => session('success'), 'state' => 'success'])
    @endif
</section>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/cabinet.js') }}"></script>
@stop
