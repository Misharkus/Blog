@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Додання поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group w-25">
                    <label>Назва</label>
                    <input type="text" class="form-control" name="title" placeholder="Назва поста"
                    value="{{ old('title') }}">
                    @error('title')
                      <div class="text-danger">Це поле необхідно заповнити</div>
                    @enderror
                </div>
                <div class="form-group">
                  <textarea id="summernote" name="content">
                    {{ old('content') }}
                  </textarea>
                  @error('content')
                      <div class="text-danger">Це поле необхідно заповнити</div>
                    @enderror
                </div>
                <div class="form-group w-50">
                    <label for="exampleInputFile">Додати превью</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image">
                        <label class="custom-file-label">Оберіть зображення</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                      </div>
                    </div>
                    @error('preview_image')
                      <div class="text-danger">Необхідно додати зображення</div>
                    @enderror
                  </div>
                <div class="form-group w-50">
                    <label for="exampleInputFile">Додати головне зображення</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image">
                        <label class="custom-file-label">Оберіть зображення</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                      </div>
                    </div>
                    @error('main_image')
                      <div class="text-danger">Необхідно додати зображення</div>
                    @enderror
                  </div>
                  <div class="form-group w-50">
                        <label>Оберіть категорію</label>
                        <select name="category_id" class="form-control">
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id')? 'selected' : '' }}
                            >{{ $category->title }}</option>
                          @endforeach
                        </select>
                      </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Додати">
                </div>
            </form>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection