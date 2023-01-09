@extends('layouts.main')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Добавление изображения</li>
                        </ol>
                    </div>
                    @if(is_null($list->image))
                        <div>
                            <img src="{{ url('storage/no-image/img.png') }}" alt="image">
                        </div>
                    @else
                        <div>
                            <img src="{{ url('storage/' . $list->image) }}" alt="image" class="w-50">
                            <h6>Текущее изображение</h6>
                        </div>
                        <div class="mt-3">
                            <form action="{{ route('list.image.delete', $list->id)}}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="mt-5 mb-2">
                        <h6>Загрузить новое изображение</h6>
                    <form action="{{ route('list.image.update', compact('list')) }}" method="POST" enctype="multipart/form-data" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group w-50">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                            </div>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                        </div>
                    </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
