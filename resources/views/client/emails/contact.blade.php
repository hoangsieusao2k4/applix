<h2>📩 Thông tin liên hệ</h2>
<p><strong>Chủ đề (Topic):</strong> {{ $data['topic'] }}</p>
<p><strong>Họ và tên:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Tiêu đề (Subject):</strong> {{ $data['subject'] }}</p>

<p><strong>Mô tả (Description):</strong></p>
<p>{{ $data['description'] }}</p>
@if(!empty($data['file']))
    <p><strong>📎 Tệp đính kèm:</strong> {{ $data['file'] }}</p>
@endif

