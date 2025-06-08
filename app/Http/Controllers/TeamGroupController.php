<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamsDB;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\HistoriesDB;

class TeamGroupController extends Controller
{
    // List all teams (grouped by group_id)
    public function index()
    {

        //disable ONLY_FULL_GROUP_BY
        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

        //Your SQL goes here - The one throwing the error (:

        //re-enable ONLY_FULL_GROUP_BY
        // DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");
        // Ambil semua group_id unik yang belum di-soft delete
        $teams = TeamsDB::whereNull('deleted_at')
            ->select('name', 'group_id')
            ->groupBy('group_id')
            ->paginate(10);

        foreach ($teams as $team) {
            // Fix: Use team->group_id instead of $team directly
            $members = TeamsDB::where('group_id', $team->group_id)
                ->whereNull('deleted_at')
                ->with('user')
                ->get();
            
            $team->members = $members;
        }

        $title = 'Team';
        return view('page.team_group.list', compact('teams', 'title'));
    }

    // Show create form
    public function create()
    {
        $users = User::all();
        $title = 'Team';
        return view('page.team_group.create', compact('users', 'title'));
    }

    // Store new team group
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_ids' => 'required|array|min:1',
        ]);

        // Generate new group_id (max+1)
        $maxGroupId = TeamsDB::max('group_id');
        $newGroupId = $maxGroupId ? $maxGroupId + 1 : 1;

        foreach ($request->user_ids as $user_id) {
            TeamsDB::create([
                'name' => $request->name,
                'group_id' => $newGroupId,
                'user_id' => $user_id,
            ]);
        }

        $title = 'Team';
        return redirect()->route('team_group.index')->with('success', 'Team created!', compact('title'));
    }

    // Show edit form
    public function edit($group_id)
    {
        $teamMembers = TeamsDB::where('group_id', $group_id)->get();
        $teamName = $teamMembers->first()->name ?? '';
        $users = User::all();
        $selectedUserIds = $teamMembers->pluck('user_id')->toArray();
        $title = 'Team';
        return view('page.team_group.edit', compact('group_id', 'teamName', 'users', 'selectedUserIds', 'title'));
    }

    // Update team group
    public function update(Request $request, $group_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_ids' => 'required|array|min:1',
        ]);

        // Update name for all members
        TeamsDB::where('group_id', $group_id)->update(['name' => $request->name]);

        // Sync members
        $existingUserIds = TeamsDB::where('group_id', $group_id)->pluck('user_id')->toArray();

        // Hapus anggota yang tidak dipilih lagi
        TeamsDB::where('group_id', $group_id)
            ->whereNotIn('user_id', $request->user_ids)
            ->delete();

        // Tambah anggota baru
        foreach ($request->user_ids as $user_id) {
            if (!in_array($user_id, $existingUserIds)) {
                TeamsDB::create([
                    'name' => $request->name,
                    'group_id' => $group_id,
                    'user_id' => $user_id,
                ]);
            }
        }

        $title = 'Team';
        return redirect()->route('team_group.index')->with('success', 'Team updated!', compact('title'));
    }

    // Delete team group
    public function destroy($group_id)
    {
        TeamsDB::where('group_id', $group_id)->delete();
        $title = 'Team';
        return redirect()->route('team_group.index')->with('success', 'Team deleted!', compact('title'));
    }

    // Show detail (optional)
    public function show($group_id)
    {
        $teamMembers = TeamsDB::where('group_id', $group_id)->with('user')->get();
        $teamName = $teamMembers->first()->name ?? '';
        $title = 'Team';
        return view('page.team_group.show', compact('teamMembers', 'teamName', 'group_id', 'title'));
    }
}
