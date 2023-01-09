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
                            <li class="breadcrumb-item active">Создание тега</li>
                        </ol>
                    </div>

                    <form action="{{ route('list.tag.store') }}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input name="title" type="text" class="form-control" placeholder="Название">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="list_id" type="hidden" value="{{ $list->id }}">
                            <input type="submit" class="btn btn-primary mt-3" value="Создать">
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
