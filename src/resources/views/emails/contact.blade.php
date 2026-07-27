<p>{{ $inputs['name'] }} 様</p>

<p>お問い合わせありがとうございます。内容を確認のうえ、ご連絡いたします。</p>

<p>■ 内容<br>
    {!! nl2br(e($inputs['message'])) !!}
</p>

<p>--------<br>
    {{ config('salon.name') }}<br>
</p>