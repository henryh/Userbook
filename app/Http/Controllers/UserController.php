<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $users)
    {
        return view('user.index', [
            'users' => $users->with('favourites')
                ->addSorting(session('user.sort'))->paginate()
        ]);
    }

    /**
     * Display users in favourite.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourites(User $users)
    {
        return view('user.index', [
            'users' => $users->has('favourites')->with('favourites')
                ->addSorting(session('user.sort'))->paginate()
        ]);
    }

    /**
     * Search user by all profile fields.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(User $users, Request $request, string $search_text = null)
    {

        if (!$search_text)
            return redirect()->route('user.search', $request->search_text);

        return view('user.index', [
            'users' => $users->with('favourites')
                ->searchText($request->search_text)
                ->addSorting(session('user.sort'))
                ->paginate(),
            'search_text' => $request->search_text
        ]);
    }

    /**
     * Favorite selector
     *
     * @param User $user
     */
    public function favouriteAction(User $user)
    {
        $user->favourites()->toggle(Auth::user()->id);

        return redirect()->back()
            ->with('success', 'Successfully toggle favourite!');
    }

    /**
     * Sorting
     *
     * @param User $user
     * @param string $sort
     */
    public function sortAction(User $user, string $sort)
    {

        session(['user.sort' => $sort]);

        return redirect()->back()
            ->with('success', 'Successfully sorted.');
    }

}