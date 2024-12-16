<h1>add publishers</h1>
<form action="{{ route('publishers.store') }}" method="POST">
    @csrf
    <label for="name">نام ناشر:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>
    
    <button type="submit">ذخیره ناشر</button>
</form>
