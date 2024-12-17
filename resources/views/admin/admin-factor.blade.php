<div class="add-admin">
    <h3 class="total-sales">قیمت کلی تمامی فروش‌ها: {{ number_format($totalSales) }} تومان</h3>

    <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr>
                <th>نام کاربر</th>
                <th>تاریخ سفارش</th>
                <th>نام محصولات</th>
                <th>تعداد کل</th>
                <th>قیمت کلی</th>
                <th>نام فروشنده</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user->name ?? 'کاربر نامشخص' }}</td>
                    <td>{{ $order->order_date }}</td>
                    @foreach ($order->items as $item)
                        <td>{{ $item->book->name ?? 'محصول حذف شده' }}<br></td>
                    @endforeach
                    <td>{{ $order->items->sum('quantity') }}</td>
                    <td>
                        {{ number_format(
                            $order->items->sum(function ($item) {
                                return $item->price * $item->quantity;
                            }),
                        ) }}
                        تومان
                    </td>
                    <td>{{ $order->seller_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
