<div class="add-admin">
    <h2>مدیریت اسلایدر</h2>

    <form action="{{ route('slider.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="book_id">کتاب مرتبط:</label>
        <select name="book_id" id="book_id" required>
            @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->name }}</option>
            @endforeach
        </select>
    
        <label for="title">عنوان اسلایدر:</label>
        <input type="text" name="title" id="title" required>
    
        <label for="image_path">عکس:</label>
        <input type="file" name="image_path" id="image_path" required>
    
        <button type="submit" class="btn btn-success">آپلود اسلاید</button>
    </form>

    <h3>اسلایدهای فعلی:</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr>
                <th>تصویر</th>
                <th>کتاب مرتبط</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td><img src="{{ asset('storage/' . $slider->image_path) }}" alt="Slider Image" width="150">
                    </td>
                    <td>{{ $slider->book ? $slider->book->name : 'بدون کتاب مرتبط' }}</td>
                    <td>
                        <form action="{{ route('slider.delete', $slider->id) }}" method="POST"
                            onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این اسلایدر را حذف کنید؟');">
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

</div>
