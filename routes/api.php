    <?php
    use App\Http\Controllers\Api\AuthController;
    use App\Http\Resources\UserResource;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/auth-user', [AuthController::class, 'index'])->middleware('auth:sanctum');

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::get('/latest-users', function (Request $request) {
        $user = User::latest()->take(2)->get();
        return UserResource::collection($user);
    });
    Route::get('response', function (Request $request) {
        return sendResponse(['name' => 'ahmed'], 200); // Global helper method.
        // return sendResponse(['name' => 'mohsen'] , false , 404); // Global helper method.
        // return sendResponse(['name' => 'ahmed'], 500); // Global helper method.
        // return sendResponse(['name' => 'ahmed'], 200); // Global helper method.
    });
