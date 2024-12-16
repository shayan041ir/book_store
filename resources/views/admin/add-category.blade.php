<h1>add category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">نام دسته‌بندی:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>
    
    <button type="submit">ذخیره دسته‌بندی</button>
</form>
