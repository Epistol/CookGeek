<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionUtil extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = DB::table('users')->latest()->paginate(10);

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function ban_user($id)
    {
        $user = User::find($id);

        return view('admin.ban.create', [
            'user' => $user,
        ]);
    }

    public function unban_user($id)
    {
        $user = User::find($id);

        return view('admin.ban.unban', [
            'user' => $user,
        ]);
    }

    public function ban_user_store(Request $request)
    {
        $user = User::find($request->user_id);

        if ($request->datechoisie) {
            $dt = Carbon::parse($request->datechoisie);
            $formatted = $dt->toDateTimeString();
        } else {
            $formatted = '+1 week';
        }

        $raison = $request->raison ? strip_tags(clean($request->raison)) : '';

        if ($request->permaban == 'on') {
            $ban = $user->ban([
                'comment'    => $raison,
                'expired_at' => null,
            ]);
            $ban->isPermanent(); // true
        } else {
            $ban = $user->ban([
                'comment'    => $raison,
                'expired_at' => $formatted,
            ]);
        }

        return redirect(route('admin.ban.index'));
    }

    public function unban_user_store(Request $request)
    {
        $user = User::find($request->user_id);
        $ban = $user->unban();

        return redirect(route('admin.ban.index'));
    }
}
