<h1>add translators</h1>
<form action="{{ route('translators.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">نام مترجم:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>

    <label for="image">عکس:</label>
    <input type="file" name="image" id="image" required>
    
    <button type="submit">ذخیره مترجم</button>
</form>

<h1>لیست مترجم ها</h1>
<table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام مترجم</th>
            <th>تصویر مترجم</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($translators as $translator)
            <tr>
                <td>{{ $translator->id }}</td>
                <td>{{ $translator->name }}</td>
                <td><img src="{{ asset('storage/' . $translator->image) }}" alt="translator Image" width="50">
                <td>
                    <form action="{{ route('translators.destroy', $translator->id) }}" method="POST"
                        onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید {{ $translator->name }} را حذف کنید؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            style="background-color: red; color: white; padding: 5px 10px;">حذف مترجم</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
