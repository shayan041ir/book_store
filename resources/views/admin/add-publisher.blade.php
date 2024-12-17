<h1>add publishers</h1>
<form action="{{ route('publishers.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <label for="name">نام ناشر:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>
    
    <label for="image">عکس:</label>
    <input type="file" name="image" id="image" required>
    
    <button type="submit">ذخیره ناشر</button>
</form>

<h1>لیست ناشر ها</h1>
<table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام ناشر</th>
            <th>تصویر ناشر</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($publishers as $publisher)
            <tr>
                <td>{{ $publisher->id }}</td>
                <td>{{ $publisher->name }}</td>
                <td><img src="{{ asset('storage/' . $publisher->image) }}" alt="publisher Image" width="50">
                <td>
                    <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST"
                        onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید {{ $publisher->name }} را حذف کنید؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            style="background-color: red; color: white; padding: 5px 10px;">حذف ناشر</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
