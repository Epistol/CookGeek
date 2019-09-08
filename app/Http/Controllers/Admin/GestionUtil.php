<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Class GestionUtil
 * @package App\Http\Controllers\Admin
 */
class GestionUtil extends Controller
{

    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $users = DB::table('users')->latest()->paginate(10);

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * @param $id
     *
     * @return Factory|View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param $id
     *
     * @return Factory|View
     */
    public function banUser($id)
    {
        $user = User::find($id);

        return view('admin.ban.create', [
            'user' => $user,
        ]);
    }

    /**
     * @param $id
     *
     * @return Factory|View
     */
    public function unbanUser($id)
    {
        $user = User::find($id);

        return view('admin.ban.unban', [
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponseAlias|Redirector
     */
    public function banUserStore(Request $request)
    {
        $user = User::find($request->user_id);

        if ($request->datechoisie) {
            $dt        = Carbon::parse($request->datechoisie);
            $formatted = $dt->toDateTimeString();
        } else {
            $formatted = '+1 week';
        }

        $raison = $request->raison ? strip_tags($request->raison) : '';

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

    /**
     * @param Request $request
     *
     * @return RedirectResponseAlias|Redirector
     */
    public function unbanUserStore(Request $request)
    {
        $user = User::find($request->user_id);
        $ban  = $user->unban();

        return redirect(route('admin.ban.index'));
    }
}
