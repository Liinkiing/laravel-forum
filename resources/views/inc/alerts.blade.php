@if(Request::hasSession() && (Session::has('errors') || Session::has('success') || Session::has('info')
    || Session::has('warning') || Session::has('danger')))
    <div class="alerts">
        @if(Session::has('errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach(Session::get('errors')->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach(['success', 'info', 'warning', 'danger'] as $type)
            @if(Session::has($type))
                <div class="alert alert-{{ $type }}">
                    {!! Session::get($type) !!}
                </div>
            @endif
        @endforeach
    </div>
@endif