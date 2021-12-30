@props([
    'title',
    'message' => '初期値です。',
    'content' => '本文の初期値です'
    ])


<div {{ $attributes->merge([
    'class' => '<x-tests.card title="タイトル" />'
])}}>
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div>
