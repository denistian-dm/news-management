<?

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService {
    
    public function store(string $name, string $email, string $password): User
    {
        $user =  User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return $user;
    }
}