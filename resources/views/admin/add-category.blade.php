<h1>add category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">نام دسته‌بندی:</label>
    <input type="text" name="name" id="name" required>

    <button type="submit">ذخیره دسته‌بندی</button>
</form>

<h1>لیست دسته‌بندی‌ها</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>نام دسته‌بندی</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('category.delete', $category->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            style="background-color: red; color: white; padding: 5px 10px;">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
