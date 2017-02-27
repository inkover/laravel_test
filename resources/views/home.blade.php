@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Заказы</div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            Для работы с сайтом нужно <a href="{{ route('login') }}">Авторизироваться</a> или
                            <a href="{{ route('register') }}">Зарегистрироваться</a>.
                        @else

                            <a href="{{ route('order_create') }}">Создать заказ</a>
                            <hr>
                            @if($user->orders->isEmpty())
                                Заказов пока нет. <a href="{{ route('order_create') }}">Создайте новый</a>
                            @else
                                @foreach($user->orders as $order)
                                    <h4>Заказ №{{ $order->id }}</h4>
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('add_order_item', ['order_id' => $order->id]) }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="product-{{ $order->id }}" class="col-md-3 control-label">Добавить
                                                товар</label>

                                            <div class="col-md-6">
                                                <select class="selectpicker" name="product_id" data-width="100%">
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}
                                                            ({{ $product->price }} руб)
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('recalc_order', ['order_id' => $order->id]) }}">
                                        {{ csrf_field() }}
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Товар</th>
                                                <th>Цена</th>
                                                <th>Кол-во</th>
                                                <th colspan="2">Сумма</th>
                                            </thead>
                                            @if ($order->items->isEmpty())
                                                <tr>
                                                    <td colspan="4">Товаров в заказе пока нет</td>
                                                </tr>
                                            @else
                                                @foreach($order->items as $item)
                                                    <tr>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td>{{ number_format($item->product->price, 2, ',', ' ') }}
                                                            руб.
                                                        </td>
                                                        <td><input name="item[{{ $item->id }}]" value="{{ $item->quantity }}" class="form-control" style="width: 50px; text-align: center;" min="0"></td>
                                                        <td>{{ number_format($item->sum, 2, ',', ' ') }} руб.</td>
                                                        <td>
                                                            <a href="{{ route('delete_order_item', ['order_id' => $order->id, 'order_item_id' => $item->id]) }}" class="btn btn-sm btn-warning" title="Удалить позицию заказа">
                                                                X
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr style="font-weight: bold;">
                                                <td colspan="2">ИТОГО:</td>
                                                <td>{{ $order->total_quantity }} шт.</td>
                                                <td colspan="2">{{ number_format($order->total_sum, 2, ',', ' ') }}
                                                    руб.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>

                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Обн
                                                    </button>

                                                </td>
                                                <td colspan="2" style="text-align: right;">
                                                    <a href="{{ route('delete_order', ['order_id' => $order->id]) }}" class="btn btn-sm btn-danger">
                                                        Удалить заказ
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                    <hr>
                                @endforeach
                                <a href="{{ route('order_create') }}">Создать заказ</a>

                            @endif


                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
