<h1>add authors</h1>
<form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">نام نویسنده:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>

    <label for="image">عکس:</label>
    <input type="file" name="image" id="image" required>

    <button type="submit">ذخیره نویسنده</button>
</form>

<h1>لیست نویسنده ها</h1>
<table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام نویسنده</th>
            <th>تصویر نویسنده</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td><img src="{{ asset('storage/' . $author->image) }}" alt="author Image" width="50">
                <td>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST"
                        onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید {{ $author->name }} را حذف کنید؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            style="background-color: red; color: white; padding: 5px 10px;">حذف نویسنده</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
