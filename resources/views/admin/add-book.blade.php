@include('admin.add-category')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>افزودن کتاب</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">نام کتاب:</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="image">عکس کتاب:</label>
                    <input type="file" name="image" id="image" required>
                </div>

                <div class="form-group">
                    <label for="price">قیمت:</label>
                    <input type="number" name="price" id="price" required>
                </div>

                <div class="form-group">
                    <label for="page_count">تعداد صفحات:</label>
                    <input type="number" name="page_count" id="page_count" required>
                </div>

                <div class="form-group">
                    <label for="stock">موجودی:</label><br>
                    <input type="number" id="stock" name="stock" required>
                </div>

                <div class="form-group">

                    <label for="translator">مترجم:</label>
                    <input type="text" name="translator" id="translator">
                </div>
                <div class="form-group">
                    <label for="publisher">ناشر:</label>
                    <input type="text" name="publisher" id="publisher" required>
                </div>

                <div class="form-group">
                    <label for="author">نویسنده:</label>
                    <input type="text" name="author" id="author" required>
                </div>

                <div class="form-group">
                    <label for="published_year">سال انتشار:</label>
                    <input type="number" name="published_year" id="published_year" required>
                </div>

                <div class="form-group">

                    <label for="category_id">دسته‌بندی‌ها:</label><br>
                    <select id="category_id" name="category_id[]" multiple>
                        @foreach ($categories as $Category)
                            <option >{{ $Category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <label>
                        <input type="checkbox" name="is_best_seller" value="1"> کتاب پرفروش
                    </label>
                </div>
                <div class="form-group">

                    <label>
                        <input type="checkbox" name="is_1001_books" value="1">1001 کتاب
                    </label>
                </div>
                <button type="submit">افزودن کتاب</button>
            </form>
        </div>
    </div>
</div>


<div class="container" style="margin-top: 30px;">
    <h2>لیست کتاب ها</h2>
    <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th>شناسه</th>
                <th>تصویر</th>
                <th>نام</th>
                <th>قیمت</th>
                <th>موجودی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" width="50">
                        @else
                            <span>بدون تصویر</span>
                        @endif
                    </td>
                    <td>{{ $book->name }}</td>
                    <td>{{ number_format($book->price) }} تومان</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        {{-- فرم حذف محصول --}}
                        <form action="{{ route('book.delete', $book->id) }}" method="POST"
                            onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background-color: red; color: white; padding: 5px 10px;">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Book</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('book.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form-group">
                    <label for="page_count">Page Count</label>
                    <input type="number" class="form-control" id="page_count" name="page_count">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>

                <div class="form-group">
                    <label for="translator">Translator</label>
                    <input type="text" class="form-control" id="translator" name="translator">
                </div>

                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" id="publisher" name="publisher">
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>

                <div class="form-group">
                    <label for="published_year">Published Year</label>
                    <input type="number" class="form-control" id="published_year" name="published_year">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select multiple class="form-control" id="category_id" name="category_id[]">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_best_seller" name="is_best_seller">
                    <label class="form-check-label" for="is_best_seller">Best Seller</label>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_1001_books" name="is_1001_books">
                    <label class="form-check-label" for="is_1001_books">1001 Books</label>
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>
</div>
