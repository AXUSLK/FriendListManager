<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendInviteRequest;
use App\Mail\InvitationEmail;
use App\Models\Friend;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function inviteForm()
    {
        return view('friends.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendInvite(SendInviteRequest $request)
    {
        $user = Auth::user();
        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $token = Str::random(32);

        $invitation = new Invitation;
        $invitation->user_id = auth()->user()->id;
        $invitation->email = $email;
        $invitation->token = $token;
        $invitation->save();


        $check_user = User::where('email', $email)->first();
        if (!$check_user) {
            $friend_user = new User;
            $friend_user->first_name = $first_name;
            $friend_user->last_name = $last_name;
            $friend_user->email = $email;
            $friend_user->password = Hash::make('asd@123');
            $friend_user->save();
            $friend_user->assignRole([2]);
        } else {
            $friend_user = $check_user;
        }

        $invitationUrl = route('friend.accept_invitation', ['token' => $token]);
        Mail::to($email)->send(new InvitationEmail($user->name, $friend_user->name, $invitationUrl));
        return redirect()->route('friends.index')->with('success', 'Invitation sent successfully');
    }

    public function acceptInvitation($token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect()->route('login')->with('error', 'Invalid invitation token');
        }
        if ($invitation->accepted_at !== null) {
            return redirect()->route('dashboard')->with('error', 'This invitation has already been accepted.');
        }
        $invitation->update(['accepted_at' => now()]);

        $user = User::where('email', $invitation->email)->first();
        Friend::create([
            'user_id' => $invitation->user_id,
            'friend_id' => $user->id,
        ]);
        Friend::create([
            'user_id' => $user->id,
            'friend_id' => $invitation->user_id,
        ]);
        Auth::login($user);
        $invitation->delete();
        return redirect()->route('friends.index')->with('success', 'Invitation accepted. ' . $invitation->user?->name . ' has been added to your friends list.');
    }
}
