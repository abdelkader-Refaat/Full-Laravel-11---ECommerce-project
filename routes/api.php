    <?php

    use App\Http\Resources\UserResource;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::get('/latest-users', function (Request $request) {
        $user = User::latest()->limit(5)->get();
        return UserResource::collection($user);

    });

