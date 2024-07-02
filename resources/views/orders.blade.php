@extends('layout')

@section('content')
<section class="section">
    <div class="order">
        <form
            class="order__content paper"
            id="js-order-form-comment"
            method="post"
            action="{{ URL::route('create.order') }}"
        >
            @csrf
            <h2 class="order__title">Создать заявку</h2>
            <div class="order__field">
                <p class="order__text">Подробно опишите проблему</p>
                <textarea
                    class="order__textarea"
                    id="js-order-textarea-comment"
                    name="comment"
                ></textarea>
            </div>
            <div class="order__action">
                <button
                    class="button"
                    id="js-order-button-comment"
                    type="submit"
                    disabled
                >
                    Создать
                </button>
            </div>
        </form>
        <div class="order__content paper">
            @if(count($orders) == 0)
            <h2 class="order__title">Список заявок пуст</h2>
            @else
            <h2 class="order__title">Список заявок</h2>
            <p class="order__text">Чтобы просмотреть значение ячейки полностью, наведите на нее мышью</p>
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
                    <div class="order__column" title="{{ $order->number }}">{{ $order->number }}</div>
                    <div class="order__column" title="{{ $order->status }}">{{ $order->status }}</div>
                    <div class="order__column" title="{{ $order->warranty_case }}">{{ $order->warranty_case }}</div>
                    <div class="order__column" title="{{ $order->comment }}">{{ $order->comment }}</div>
                    <div class="order__column" title="{{ $order->resolution }}">{{ $order->resolution }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    @if(session('success'))
        @include('message', ['content' => session('success'), 'state' => 'success'])
    @endif
</section>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/orders.js') }}"></script>
@stop
