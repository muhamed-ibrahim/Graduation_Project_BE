@extends('emails.layout', ['title' => 'Account Reactivation'])
@section('style')
    <style>
        .proton-table tr td {
            padding: 0px 40px;
        }

        ul {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px 5px;
            border-radius: 6px;
            border: 1px dashed #024ef0aa;
            background: #fff;
            color: #024ef0;
            font-weight: 900;
            font-size: 21px;
        }
    </style>
@endsection
@section('content')
    <h1>تم رفض طلبكم</h1>
    <p>تم رفض طلبكم الخاص ب  {{$application->school->name}}</p>
    <p> نأسف لإبلاغكم بأن طلبكم قد تم رفضه.</p>
    <p>شكراً لكم.</p>

@endsection
