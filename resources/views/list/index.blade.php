@extends('layouts.main')

@section('content')
    <div class="mt-5">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('list.search') }}" method="GET" class="w-50">
                            <div class="form-group">
                                <input id="title-search-input" type="text" name="s" value=""
                                       class="form-control @error('s') is-invalid @enderror" required
                                       placeholder="Поиск по списку">
                                <button type="submit" class="btn btn-dark mt-3 mb-5">Поиск</button>
                            </div>
                        </form>

                        <form id="todoForm" class="w-100">

                            <div class="form-group">
                                <input id="content" name="content" type="text" class="form-control"
                                       placeholder="Контент">
                                <button class="btn btn-primary mt-3" id="submit">Добавить</button>
                                <div class="alert alert-danger mt-2 d-none" id="content-error" role="alert"></div>
                            </div>
                        </form>
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
                                    @if(!$lists->isEmpty())
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
                                    @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>
        $('#todoForm').on('submit', function (event) {
            event.preventDefault();

            let content = $('#content').val();

            $.ajax({
                url: "/",
                type: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    content: content,
                },
                error(err) {
                    const data = err.responseJSON;

                    for (let key in err.responseJSON.errors) {
                        let error_text = err.responseJSON.errors[key][0];
                        $(`#${key}-error`).removeClass('d-none').text(error_text);
                    }

                },
                success: function (data) {
                    $('#result').append(`<tr><td>${data.list.id}</td>
                    <td>${data.list.content}</td>
                    <td><div><a href="/image/${data.list.id}/add">
                    <img src="{{ url('storage/no-image/img.png') }}"
                    alt="image" width="150" height="150"></a></div></td>
                    <td></td>
                    <td class="text-center">
                    <a class="btn btn-warning" href="/${data.list.id}/edit">Редактировать</a>
                    <a class="btn btn-dark" href="/tag/${data.list.id}/create">Добавить тег</a></td></tr>`);
                },
            });
        });
    </script>
@endsection
