{{-- 상송 --}}
@extends('layout.layout')
{{-- extends가 자식임 --}}

{{-- @section : 부모 템플릿에 해당하는 yield에 삽입 --}}
@section('title', '자식자식')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 범위를 지정해서 삽입  --}}
@section('main')
<main>
    <h2>자식의 메인 영역</h2>
</main>
@endsection

@section('show', '자식자식 show')

<hr>
{{-- @if : 조건문 --}}
@if($data[0]['gender'] === 'F') 
    <span>여자</span>
@elseif($data[0]['gender'] === 'M')
    <span>남자</span>
@else
    <span>알수없음</span>
@endif
<hr>

{{-- 반복문 --}}
{{-- @for ~ @endfor : for 반목문 --}}
@for($i = 0; $i < 5; $i++)
    <span>{{$i}}</span>
@endfor
<br>
{{-- 구구단 --}}
{{-- @for($a = 2; $a <= 9; $a++)
    <h2>{{'*** '.$a.'단 ***'}}</h2>
    @for($b = 1; $b <= 9; $b++)
        <span>{{$a.' X '.$b.' = '.($a * $b)}}</span>
        <br>
    @endfor
@endfor --}}
{{-- @for($a = 2; $a <= 9; $a++)
    <h2>*** .{{$a}}.단 ***</h2>
    @for($b = 1; $b <= 9; $b++)
        <span>{{$a}}. X .{{$b}}. = .{{$a}} * {{$b}}</span>
        <br>
    @endfor
@endfor --}}

{{-- foreach ~ @endforeach : foreach 반복문 --}}
@foreach($data as $item)
    @if($loop->odd) 
        <div style="color: purple;">
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender'] }}</span>
            {{-- <span>남은 루프 횟수 : {{ $loop->remaining }}</span> --}}
        </div>
    @else
        <div style="color: navy">
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender'] }}</span>
            {{-- <span>남은 루프 횟수 : {{ $loop->remaining }}</span> --}}
        </div>
    @endif
@endforeach

{{-- @forelse ~ @empty ~ @endforelse : 
    루프할 데이터의 길이가 1이상이면 $forelse의 처리를,
    배경의 길이가 0이면 @empty의 처리를 한다. --}}
@forelse($data2 as $item)
        <div>{{ $item['name'] }}</div>
@empty
        <br><span>데이터 없음</span>
@endforelse