<!DOCTYPE html>
<html>

<head>
    <title>Trang Đăng Ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container p {
            text-align: center;
            margin-bottom: 20px;
        }

        .container label {
            display: block;
            margin-bottom: 10px;
        }

        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .container hr {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .container .registerbtn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .container .registerbtn:hover {
            background-color: #45a049;
        }

        .container p.signin {
            text-align: center;
            margin-top: 10px;
        }

        .container p.signin a {
            color: #4CAF50;
        }

        .container p.signin a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form action="{{ route('customer.checkRegister') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <h1>Trang Đăng Ký</h1>

            <div class="form-group">
                <label for="name">Tên Đăng Nhập</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="address">Địa Chỉ</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            @error('address')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            @error('email')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            @error('phone')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="psw">Mật Khẩu</label>
                <input type="password" name="psw" id="psw" class="form-control">
            </div>
            @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="psw-repeat">Xác Nhận Mật Khẩu</label>
                <input type="password" name="psw_repeat" id="psw-repeat" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Ảnh Đại Diện</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            @error('image')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary registerbtn">Đăng Ký</button>

            <p class="signin">Bạn Đã Có Tài Khoản? <a href="{{ route('customer.login') }}">Đăng Nhập</a>.</p>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
