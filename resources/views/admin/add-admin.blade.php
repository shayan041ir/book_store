<div class="add-admin">
    @if (session('msj'))
        <h6>{{ session('msj') }}</h6>
    @endif

    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">افزودن ادمین</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.addadmin') }}" method="post">
                @csrf
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="text" name="name" placeholder="name">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <button type="submit" class="btn btn-success">افزودن</button>

            </form>
        </div>
    </div>
    
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">ویرایش اطلاعات ادمین</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update') }}" method="POST" class="needs-validation">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @method('PUT')

                <input type="text" id="name" name="name" placeholder="name" required>
                <input type="password" id="password_confirmation"placeholder="password" name="password_confirmation">
                <button type="submit" class="btn btn-success">ویرایش</button>

            </form>
        </div>
    </div>
    <h1>حذف ادمین</h1>
    <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @if (auth()->id() !== $admin->id)
                            <!-- جلوگیری از حذف ادمین جاری -->
                            <form action="{{ route('admin.delete', $admin->id) }}" method="POST"
                                onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید ادمین {{ $admin->name }} را حذف کنید؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    style="background-color: red; color: white; padding: 5px 10px;">حذف ادمین</button>
                            </form>
                        @else
                            <span class="text-muted" style="background-color: red; color: white; padding: 5px 10px;">شما
                                نمی‌توانید خودتان را حذف کنید</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmDelete(userName) {
            return confirm(`آیا مطمئن هستید که می‌خواهید ادمین ${userName} را حذف کنید؟`);
        }
    </script>

</div>
