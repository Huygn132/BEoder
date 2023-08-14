<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa dự án</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Chỉnh sửa dự án</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('project.update', $project->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label for="project_name">案件名</label>
            <input type="text" class="form-control" id="project_name" name="project_name" value="{{ $project->project_name }}">
        </div>

        <div class="form-group">
            <label for="order_number">オーダーNo</label>
            <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $project->order_number }}">
        </div>

        <div class="form-group">
            <label for="client_name">顧客名</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $project->client_name }}">
        </div>

        <div class="form-group">
            <label for="order_date">オーダー日付</label>
            <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $project->order_date }}">
        </div>

        <div class="form-group">
            <label for="status">ステータス</label>
            <select class="form-control" id="status" name="status">
                <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>実行中</option>
                <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>非活性</option>
                <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>保留</option>
                <option value="3" {{ $project->status == 3 ? 'selected' : '' }}>完了</option>
                <option value="4" {{ $project->status == 4 ? 'selected' : '' }}>キャンセル </option>
            </select>
        </div>

        <div class="form-group">
            <label for="order_income">受注額</label>
            <input type="text" class="form-control" id="order_income" name="order_income" value="{{ $project->order_income }}">
        </div>
        <div class="form-group">
            <label for="internal_unit_price">社内単金</label>
            <input type="number" class="form-control" id="internal_unit_price" name="internal_unit_price" value="{{ old('internal_unit_price', $project->internal_unit_price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
