@include('admin.add-category')

<h1>add book</h1>
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">نام کتاب:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="image">عکس کتاب:</label>
    <input type="file" name="image" id="image" required>
    <br>

    <label for="price">قیمت:</label>
    <input type="number" name="price" id="price" required>
    <br>

    <label for="page_count">تعداد صفحات:</label>
    <input type="number" name="page_count" id="page_count" required>
    <br>

    <label for="stock">موجودی:</label><br>
    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required>

    <br>

    <label for="translator">مترجم:</label>
    <input type="text" name="translator" id="translator">
    <br>

    <label for="publisher">ناشر:</label>
    <input type="text" name="publisher" id="publisher" required>
    <br>

    <label for="author">نویسنده:</label>
    <input type="text" name="author" id="author" required>
    <br>

    <label for="published_year">سال انتشار:</label>
    <input type="number" name="published_year" id="published_year" required>
    <br>

    <label for="category_id">دسته‌بندی‌ها:</label><br>
    <select id="category_id" name="category_id[]" multiple>
        @foreach ($categories as $Category)
            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
        @endforeach

    </select>
    <br>


    <button type="submit">افزودن کتاب</button>
</form>


<div class="container" style="margin-top: 30px;">
    <h2>لیست کتاب ها</h2>
    <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th>شناسه</th>
                <th>تصویر</th>
                <th>نام</th>
                <th>قیمت</th>
                <th>موجودی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}"
                                width="50">
                        @else
                            <span>بدون تصویر</span>
                        @endif
                    </td>
                    <td>{{ $book->name }}</td>
                    <td>{{ number_format($book->price) }} تومان</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        {{-- فرم حذف محصول --}}
                        <form action="{{ route('book.delete', $book->id) }}" method="POST"
                            onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background-color: red; color: white; padding: 5px 10px;">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
