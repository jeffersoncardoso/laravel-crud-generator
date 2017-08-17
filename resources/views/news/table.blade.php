<table class="table table-responsive" id="news-table">
    <thead>
        <th>Subject</th>
        <th>Description</th>
        <th>Author</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($news as $news)
        <tr>
            <td>{!! $news->subject !!}</td>
            <td>{!! $news->description !!}</td>
            <td>{!! $news->author !!}</td>
            <td>
                {!! Form::open(['route' => ['news.destroy', $news->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('news.show', [$news->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('news.edit', [$news->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>