@extends('layouts.main')

@section('content')
    <div class="mt-5">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Фильтрация по тегам</li>
                        </ol>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content mt-5">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Превью</th>
                                        <th>Теги</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody id="result">

                                    @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->content }}</td>
                                            <td>
                                                @if(is_null($list->image))
                                                    <div>
                                                        <a href="{{ route('list.image.add', $list->id) }}">
                                                            <img src="{{ url('storage/no-image/img.png') }}"
                                                                 alt="image" width="150" height="150">
                                                        </a>
                                                    </div>

                                                @else
                                                    <div>
                                                        <a href="{{ route('list.image.add', $list->id) }}">
                                                            <img src="{{ url('storage/' . $list->image) }}" alt="image"
                                                                 width="150" height="150">
                                                        </a>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>

                                                @foreach($list->tags as $tag)
                                                        <a class="btn btn-secondary" href="{{ route('list.search.tag', $tag->id) }}">{{ $tag->title }}</a>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning" href="{{ route('list.edit', $list->id) }}">Редактировать</a>
                                                <a class="btn btn-dark"
                                                   href="{{ route('list.tag.create', $list->id) }}">Добавить тег</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
