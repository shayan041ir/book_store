<h1>add slider</h1>
<form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="book_id">کتاب مرتبط:</label>
    <select name="book_id" id="book_id" required>
        @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>
    
    <label for="title">عنوان اسلایدر:</label>
    <input type="text" name="title" id="title" required>
    
    <label for="image_path">عکس:</label>
    <input type="file" name="image_path" id="image_path" required>
    
    <button type="submit">ذخیره اسلایدر</button>
</form>
