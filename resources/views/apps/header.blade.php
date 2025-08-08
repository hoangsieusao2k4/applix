       <div class="section_header">
                    <div class="header_top">
                        <div class="details">
                            <h1>Tao app</h1>
                            <p>
                                Quản lý ứng dụng, cài đặt và công cụ dễ dàng từ đây.</p>
                        </div>
                        <div class="actions">
                            <input type="search" placeholder="Tìm kiếm App">
                            <a class="add" href="{{ route('apps.create') }}">Tạo mới app</a>
                        </div>
                    </div>
                    <div class="header_tabs">
                        <a class="tab active" href="{{route('apps.index')}}">App của tôi</a>
                        <a class="tab" href="{{route('showMember')}}">Thành viên</a>
                        <a class="tab" href="{{route('apps.edit.account')}}">Cài đặt tài khoản</a>
                    </div>

                </div>
