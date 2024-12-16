<h1>add translators</h1>
<form action="{{ route('translators.store') }}" method="POST">
    @csrf
    <label for="name">نام مترجم:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="description">توضیحات:</label>
    <textarea name="description" id="description"></textarea>
    
    <button type="submit">ذخیره مترجم</button>
</form>
