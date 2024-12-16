<h1>add authors</h1>
<form action="{{ route('authors.store') }}" method="POST">
    @csrf
    <label for="name">نام نویسنده:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>
    
    <button type="submit">ذخیره نویسنده</button>
</form>
