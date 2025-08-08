<?php


return [
    'plans' => [
        'free' => [
            'key' => 'free',
            'name' => 'Gói Miễn Phí',
            'price' => 0, // đơn vị: đồng
            'description' => 'Tạo ứng dụng Android đầu tiên của bạn miễn phí và trải nghiệm hầu hết các tính năng trong 30 ngày trước khi nâng cấp lên gói trả phí.',
            'duration' => 30, // không hết hạn hoặc giới hạn dùng thử
        ],
        'yearly' => [
            'key' => 'yearly',
            'name' => 'Gói Theo Năm',
            'price' => 69000, // 69.000 đồng mỗi năm
            'description' => 'Thanh toán hàng năm, bao gồm tất cả tính năng cao cấp, cập nhật và quyền truy cập vào các cải tiến mới.',
            'duration' => 365, // số ngày
        ],
        'lifetime' => [
            'key' => 'lifetime',
            'name' => 'Gói Trọn Đời',
            'price' => 89000, // ví dụ 89.000 đồng
            'description' => 'Thanh toán một lần để sử dụng tất cả tính năng cao cấp và cập nhật trọn đời, không cần gia hạn hoặc trả thêm phí.',
            'duration' => null, // không hết hạn
        ],
    ],
];
