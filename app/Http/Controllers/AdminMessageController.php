<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminMessageRequest;
use App\Http\Resources\AdminMessageResource;
use App\Models\AdminLog;
use App\Models\AdminMessage;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 20);

        return AdminMessageResource::collection(AdminMessage::with('user')->orderBy('id', 'desc')->paginate($perPage));
    }

    public function store(StoreAdminMessageRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $message = AdminMessage::create($data);
        $message->load('user');

        AdminLog::create([
            'user_name' => $request->user()->name,
            'method' => 'POST',
            'action_name' => 'Wysłał wiadomość',
        ]);

        return response()->json(AdminMessageResource::make($message), 201);
    }

    public function accept(AdminMessage $message, #[CurrentUser] User $user)
    {
        $message->update(['is_accepted' => true]);
        $message->load('user');

        AdminLog::create([
            'user_name' => $user->name,
            'method' => 'POST',
            'action_name' => "Zaakceptował wiadomość od $message->user->name",
        ]);

        return response()->json(AdminMessageResource::make($message));
    }

    public function delete(AdminMessage $message, #[CurrentUser] User $user)
    {
        $message->delete();
        AdminLog::create([
            'user_name' => $user->name,
            'method' => 'DELETE',
            'action_name' => 'Usunął wiadomość',
        ]);

        return response()->json(null, 204);
    }
}
