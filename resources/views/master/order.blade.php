@extends('layout')

@section('content')
<section class="section">
    <div class="order">
        <form
            class="order__form order__content paper"
            method="post"
            action="{{ URL::route('edit.order', ['id' => $order->id]) }}"
        >
            @csrf
            <h2 class="order__title">Детали заявки</h2>
            <div class="order__fields">
                <div class="order__field">
                    <div class="order__field__title">Номер:</div>
                    <div class="order__field__value">{{ $order->number }}</div>
                </div>
                <div class="order__field">
                    <div class="order__field__title">Статус:</div>
                    <div class="order__field__value">
                        <select
                            class="order__select"
                            name="status"
                        >
                            @foreach($statuses as $status)
                            @if($status == $order->status)
                            <option value="{{ $status }}" selected>{{ $status }}</option>
                            @else
                            <option value="{{ $status }}">{{ $status }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="order__field">
                    <div class="order__field__title">Гарантийный случай:</div>
                    <div class="order__field__value">
                        @php
                        $No = 'Нет';
                        $Yes = 'Да';
                        @endphp
                        <label>
                            {{ $Yes }}
                            @if($order->warranty_case == $Yes)
                            <input class="order__radio" name="warranty_case" type="radio" value="{{ $Yes }}" checked />
                            @else
                            <input class="order__radio" name="warranty_case" type="radio" value="{{ $Yes }}" />
                            @endif
                        </label>
                        <label>
                            {{ $No }}
                            @if($order->warranty_case == $No)
                            <input class="order__radio" name="warranty_case" type="radio" value="{{ $No }}" checked />
                            @else
                            <input class="order__radio" name="warranty_case" type="radio" value="{{ $No }}" />
                            @endif
                        </label>
                    </div>
                </div>
                <div class="order__field">
                    <div class="order__field__title">Описание:</div>
                    <div class="order__field__value">{{ $order->comment }}</div>
                </div>
                <div class="order__field">
                    <div class="order__field__title">Резолюция:</div>
                    <div class="order__field__value">
                        <textarea class="order__textarea" name="resolution" value="{{ $order->resolution }}">{{ $order->resolution }}</textarea>
                    </div>
                </div>
            </div>
            <div class="order__action">
                <button class="button" type="submit">Сохранить изменения</button>
            </div>
        </form>
    </div>
    @if(session('success'))
        @include('message', ['content' => session('success'), 'state' => 'success'])
    @endif
    @if ($errors->all())
		@foreach ($errors->all() as $error)
		@include('message', ['content' => $error, 'state' => 'error'])
		@endforeach
	@endif
</section>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/master.orders.js') }}"></script>
@stop
