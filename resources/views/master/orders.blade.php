@extends('layout')

@section('content')
<section class="section">
    <div class="order">
        <div class="order__content paper">
            @if(count($orders) == 0)
            <h2 class="order__title">Список заявок пуст</h2>
            @else
            <h2 class="order__title">Список заявок</h2>
            <p class="order__text">Кликните на строку в таблице, чтобы перейти в детали заявки</p>
            <div class="order__row">
                <div class="order__column font-bold">Номер</div>
                <div class="order__column font-bold">Статус</div>
                <div class="order__column font-bold">Гарантийный случай</div>
                <div class="order__column font-bold">Описание</div>
                <div class="order__column font-bold">Резолюция</div>
            </div>
            <div class="order__items">
                @foreach($orders as $order)
                <div class="order__row">
                    <a
                        class="order__link"
                        href="{{ route('order', ['id' => $order->id]) }}"
                    ></a>
                    <div class="order__column">{{ $order->number }}</div>
                    <div class="order__column">{{ $order->status }}</div>
                    <div class="order__column">{{ $order->warranty_case }}</div>
                    <div class="order__column">{{ $order->comment }}</div>
                    <div class="order__column">{{ $order->resolution }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/master.orders.js') }}"></script>
@stop
