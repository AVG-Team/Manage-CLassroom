<?php

namespace Database\Seeders;

use App\Enums\PasswordResetTokenStatus;
use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fullname_array = [
            "Nguyễn Văn An", "Trần Thị Bích", "Lê Thị Hồng", "Phạm Minh Tuấn", "Vũ Thị Lan",
            "Đặng Quang Huy", "Ngô Thị Mai", "Hoàng Thị Thu", "Bùi Thanh Tùng", "Đỗ Thị Hạnh",
            "Phan Văn Dũng", "Nguyễn Thị Kim Oanh", "Trần Quang Anh", "Lê Thị Ngọc", "Phạm Thị Phương",
            "Vũ Minh Khang", "Đặng Thị Hoa", "Ngô Văn Khánh", "Hoàng Minh Phương", "Bùi Thị Yến",
            "Đinh Thị Hương", "Mai Văn Thắng", "Đoàn Thị Dung", "Nguyễn Hoàng Nam", "Trần Văn Toàn",
            "Lê Thị Thảo", "Phạm Quang Hưng", "Vũ Thị Hà", "Đặng Thanh Tâm", "Ngô Thị Huyền",
            "Hoàng Văn Đức", "Bùi Văn Phú", "Đỗ Thị Ngân", "Phan Thị Mỹ", "Nguyễn Minh Quân",
            "Trần Thị Tuyết", "Lê Văn Hùng", "Phạm Thị Vân", "Vũ Minh Tuấn", "Đặng Thị Mai",
            "Ngô Thị Lệ", "Hoàng Văn Hòa", "Bùi Thị Thanh", "Đỗ Văn Hải", "Phan Thị Ngọc",
            "Nguyễn Văn Bảo", "Trần Thị Hằng", "Lê Minh Anh", "Phạm Thị Diệu", "Vũ Văn Hoàng",
            "Đặng Văn Long", "Ngô Văn Sơn", "Hoàng Thị Liên", "Bùi Văn Bình", "Đỗ Minh Tuấn",
            "Phan Thị Hồng", "Nguyễn Văn Hưng", "Trần Thị Hiền", "Lê Văn Duy", "Phạm Thị Thùy",
            "Vũ Thị Thanh", "Đặng Thị Bình", "Ngô Thị Duyên", "Hoàng Văn Hạnh", "Bùi Minh Châu",
            "Đỗ Văn Toàn", "Phan Thị Hoa", "Nguyễn Văn Thành", "Trần Thị Loan", "Lê Văn Đức",
            "Phạm Thị Hường", "Vũ Thị Thu", "Đặng Minh Quân", "Ngô Thị Ngân", "Hoàng Văn Long",
            "Bùi Văn Hải", "Đỗ Thị Thanh", "Phan Thị Mai", "Nguyễn Minh Tâm", "Trần Văn Dũng",
            "Lê Thị Thu", "Phạm Thị Ngọc", "Vũ Văn Khoa", "Đặng Thị Lý", "Ngô Thị Yến",
            "Hoàng Văn Đạt", "Bùi Văn Phúc", "Đỗ Thị Hồng", "Phan Văn Bình", "Nguyễn Văn Phú",
            "Trần Thị Lê", "Lê Văn Minh", "Phạm Thị Hạnh", "Vũ Thị Dung", "Đặng Minh Tuấn",
            "Ngô Văn Thành", "Hoàng Thị Mai", "Bùi Văn Nghĩa", "Đỗ Thị Lan", "Phan Thị Tuyết"
        ];

        $phone_numbers = [
            "0901234567", "0902345678", "0903456789", "0904567890", "0905678901",
            "0906789012", "0907890123", "0908901234", "0909012345", "0901234567",
            "0902345678", "0903456789", "0904567890", "0905678901", "0906789012",
            "0907890123", "0908901234", "0909012345", "0901234567", "0902345678",
            "0903456789", "0904567890", "0905678901", "0906789012", "0907890123",
            "0908901234", "0909012345", "0901234567", "0902345678", "0903456789",
            "0904567890", "0905678901", "0906789012", "0907890123", "0908901234",
            "0909012345", "0901234567", "0902345678", "0903456789", "0904567890",
            "0905678901", "0906789012", "0907890123", "0908901234", "0909012345",
            "0901234567", "0902345678", "0903456789", "0904567890", "0905678901",
            "0906789012", "0907890123", "0908901234", "0909012345", "0901234567",
            "0902345678", "0903456789", "0904567890", "0905678901", "0906789012",
            "0907890123", "0908901234", "0909012345", "0901234567", "0902345678",
            "0903456789", "0904567890", "0905678901", "0906789012", "0907890123",
            "0908901234", "0909012345", "0901234567", "0902345678", "0903456789",
            "0904567890", "0905678901", "0906789012", "0907890123", "0908901234",
            "0909012345", "0901234567", "0902345678", "0903456789", "0904567890",
            "0905678901", "0906789012", "0907890123", "0908901234", "0909012345",
            "0901234567", "0902345678", "0903456789", "0904567890", "0905678901",
            "0906789012", "0907890123", "0908901234", "0909012345"
        ];

        $emails = [
            "nguyen.van.an@gmail.com", "tran.thi.bich@outmail.com", "le.thi.hong@outlook.com",
            "pham.minh.tuan@hotmail.com", "vu.thi.lan@gmail.com", "dang.quang.huy@gmail.com",
            "ngo.thi.mai@outmail.com", "hoang.thi.thu@outlook.com", "bui.thanh.tung@hotmail.com",
            "do.thi.hanh@gmail.com", "phan.van.dung@gmail.com", "nguyen.thi.kim.oanh@outlook.com",
            "tran.quang.anh@hotmail.com", "le.thi.ngoc@gmail.com", "pham.thi.phuong@outmail.com",
            "vu.minh.khang@gmail.com", "dang.thi.hoa@outlook.com", "ngo.van.khanh@hotmail.com",
            "hoang.minh.phuong@gmail.com", "bui.thi.yen@gmail.com", "dinh.thi.huong@outmail.com",
            "mai.van.thang@outlook.com", "doan.thi.dung@hotmail.com", "nguyen.hoang.nam@gmail.com",
            "tran.van.toan@gmail.com", "le.thi.thao@outmail.com", "pham.quang.hung@outlook.com",
            "vu.thi.ha@hotmail.com", "dang.thanh.tam@gmail.com", "ngo.thi.huyen@outmail.com",
            "hoang.van.duc@hotmail.com", "bui.van.phu@outlook.com", "do.thi.ngan@gmail.com",
            "phan.thi.my@outmail.com", "nguyen.minh.quan@gmail.com", "tran.thi.tuyet@outlook.com",
            "le.van.hung@hotmail.com", "pham.thi.van@outmail.com", "vu.minh.tuan@gmail.com",
            "dang.thi.mai@outlook.com", "ngo.thi.le@hotmail.com", "hoang.van.hoa@outmail.com",
            "bui.thi.thanh@gmail.com", "do.van.hai@outmail.com", "phan.thi.ngoc@outlook.com",
            "nguyen.van.bao@hotmail.com", "tran.thi.hang@outmail.com", "le.minh.anh@gmail.com",
            "pham.thi.dieu@outlook.com", "vu.van.hoang@outmail.com", "dang.van.long@gmail.com",
            "ngo.van.son@outmail.com", "hoang.thi.lien@outlook.com", "bui.van.binh@hotmail.com",
            "do.minh.tuan@outmail.com", "phan.thi.hong@gmail.com", "nguyen.van.hung@outlook.com",
            "tran.thi.hien@outlook.com", "le.van.duy@hotmail.com", "pham.thi.thuy@outmail.com",
            "vu.thi.thanh@gmail.com", "dang.thi.binh@outmail.com", "ngo.thi.duyen@outlook.com",
            "hoang.van.hanh@outmail.com", "bui.minh.chau@gmail.com", "do.van.toan@outlook.com",
            "phan.thi.hoa@hotmail.com", "nguyen.van.thanh@outmail.com", "tran.thi.loan@gmail.com",
            "le.van.duc@outmail.com", "pham.thi.huong@outlook.com", "vu.thi.thu@outmail.com",
            "dang.minh.quan@gmail.com", "ngo.thi.ngan@outlook.com", "hoang.van.long@outmail.com",
            "bui.van.hai@gmail.com", "do.thi.thanh@outmail.com", "phan.thi.mai@outlook.com",
            "nguyen.minh.tam@outmail.com", "tran.van.dung@gmail.com", "le.thi.thu@outmail.com",
            "pham.thi.ngoc@outlook.com", "vu.van.khoa@outmail.com", "dang.thi.ly@gmail.com",
            "ngo.thi.yen@outmail.com", "hoang.van.dat@outlook.com", "bui.van.phuc@outmail.com",
            "do.thi.hong@gmail.com", "phan.van.binh@outmail.com", "nguyen.van.phu@outlook.com",
            "tran.thi.le@outmail.com", "le.van.minh@gmail.com", "pham.thi.hanh@outlook.com",
            "vu.thi.dung@outmail.com", "dang.minh.tuan@gmail.com", "ngo.van.thanh@outlook.com",
            "hoang.thi.mai@outmail.com", "bui.van.nghia@gmail.com", "do.thi.lan@outmail.com",
            "phan.thi.tuyet@outlook.com"
        ];

        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i <= 80; $i++) {
            $arr[] = [
                'name' => $fullname_array[$i - 1],
                'email' => $emails[$i - 1],
                'phone' => $phone_numbers[$i - 1],
                'address' => $faker->address(),
                'birthday' => $faker->date(),
                'gender' => $faker->randomElement([true, false]),
                'role' => $faker->randomElement(UserRoleEnum::getValues()),
                'password' => Hash::make('12345678'),
                'remember_token' => null,
            ];
        }
        User::insert($arr);
    }
}
