use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@kompas.com',
    'password' => Hash::make('admin123'),
    'role' => 'admin',
]);
