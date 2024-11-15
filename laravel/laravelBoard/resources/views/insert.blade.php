@extends('layout.layout')

@section('title', '작성 페이지')

@section('bodyClassVh', 'vh-100')

@section('main')
<main class="d-flex justify-content-center align-items-center" style="height: 85vh;">
    <form style="width: 600px;" action="{{ route('boards.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- 에러메세지 출력 --}}
        @if($errors->any())
            <div id="errorMsg" class="form-text text-danger">
                @foreach($errors->all() as $errorMsg)
                    <span>{{ $errorMsg }}</span>
                    <br>
                @endforeach
            </div>
        @endif
        {{-- <div class="mb-3 d-flex justify-content-evenly form-floating">
            <label for="bc_type" class="form-label">게시판 선택</label>
            <select name="bc_type" id="bc_type">
                <option value="select">게시판 선택</option>
                <option value="0">자유게시판</option>
                <option value="1">질문게시판</option>
                <option value="2">문의게시판</option>
            </select>
        </div> --}}
        <div class="mb-3 d-flex justify-content-center align-items-center" style="width: 575px;">
            <label for="b_title" class="form-label" style="width: 10%;">제목</label>
            <input type="text" class="form-control" id="b_title" name="b_title" value="{{ old('b_title')}}">
        </div>
        <div class="mb-3 d-flex justify-content-center align-items-center" style="width: 575px;">
            <label for="b_content" class="form-label" style="width: 10%;">내용</label>
            <input type="text" class="form-control" id="b_content" name="b_content" style="height: 200px;" value="{{ old('b_content')}}">
        </div>
        <div class="mb-3 d-flex justify-content-start align-items-center">
            <label for="file" class="form-label">이미지</label>
            <input type="file" name="file">
        </div>
        <div class="d-flex justify-content-evenly align-items-center">
            <button type="submit" class="btn btn-primary btn-dark w-25 mb-3" style="width: 50px;">작성</button>
            <a href="{{ route('boards.index') }}" class="mb-3 btn btn-secondary w-25" style="width: 50px;">취소</a>
        </div>
        <input type="hidden" name="bc_type" value="{{ $bcType }}">
    </form>
</main>
@endsection