@extends('layout')

@section('content')
<section class="section">
    <div class="about">
        <div class="about__item about__item--left-column paper">
            <h4 class="about__item__title">
                О нас
            </h4>
            <p class="about__item__text">Мы занимаемся сервисным обслуживанием клиентов с 1893 г.

                За время нашего существования было починено 192462 приборов

                Мы продолжаем совершенствовать наши знания и навыки, чтобы брать в работу более сложные приборы

                Так же у нас очень сильная команда профессионалов!
            </p>
        </div>
        <div class="about__item about__item--right-row-top paper">
            <h4 class="about__item__title">
                Наши правила
            </h4>
            <p class="about__item__text">Профессионализм и клиентоориентированность
                Клиент обычно не бывает прав
                Если рыба, то щука
            </p>
        </div>
        <div class="about__item about__item--right-row-bottom paper">
            <h4 class="about__item__title">
                Мы расположены
            </h4>
            <p class="about__item__text">г. Ижевск, ул. Красивая, дом Модный, этаж 0</p>
        </div>
    </div>
    @if (Auth::guest())
    <div class="unauthorized">
        <p class="unauthorized__text">
            <a class="unauthorized__link" href="{{ route('login.form') }}">Авторизуйтесь</a>, чтобы иметь возможность узнать статус заявки и ознакомиться с другими разделами сайта
        </p>
    </div>
    @endif
    @if (Auth::check())
    <div class="navigation">
        <a class="navigation__link" href="{{ route('orders') }}">Заявки</a>
        <a class="navigation__link" href="{{ route('cabinet') }}">Личный кабинет</a>
    </div>
    @endif
</section>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/app.js') }}"></script>
@stop
