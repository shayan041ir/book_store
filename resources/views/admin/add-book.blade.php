<h1>add book</h1>
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">نام کتاب:</label>
    <input type="text" name="title" id="title" required>
    
    <label for="image">عکس کتاب:</label>
    <input type="file" name="image" id="image" required>
    
    <label for="price">قیمت:</label>
    <input type="number" name="price" id="price" required>
    
    <label for="pages">تعداد صفحات:</label>
    <input type="number" name="pages" id="pages" required>
    
    <label for="translator">مترجم:</label>
    <input type="text" name="translator" id="translator">
    
    <label for="publisher">ناشر:</label>
    <input type="text" name="publisher" id="publisher" required>
    
    <label for="author">نویسنده:</label>
    <input type="text" name="author" id="author" required>
    
    <label for="published_year">سال انتشار:</label>
    <input type="number" name="published_year" id="published_year" required>
    
    <button type="submit">ذخیره کتاب</button>
</form>
