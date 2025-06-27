@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🔍 Lowongan Kerja</h2>
    <ul>
        @foreach($lowongans as $l)
            <li>
                <a href="{{ route('pencaker.lowongan.show', $l->id) }}">
                    <strong>{{ $l->title }}</strong> — {{ $l->location }} (Deadline: {{ $l->deadline->format('d M Y') }})
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection