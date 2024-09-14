<?php

use App\Models\ChatSession;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('chat.{chatSessionId}', function ($user, $senderId, $receiverId) {
//     return (int) $user->id === (int) $senderId || (int) $user->id === (int) $receiverId;
// });
Broadcast::channel('chat.{chatSessionId}', function ($user, $chatSessionId) {
    // Retrieve the chat session with eager loading
    $chatSession = ChatSession::with('company')->with('attendee')->find($chatSessionId);

    if (!$chatSession) {
        return false;
    }

    $isAttendee = $user->id === $chatSession->attendee->user_id;
    $isCompany = $user->id === $chatSession->company->user_id; 

    return $isAttendee || $isCompany;
});

Broadcast::channel('presence-chat.{chatSessionId}', function ($user, $chatSessionId) {
    return ['id' => $user->id, 'name' => $user->first_name];
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    // Check if the user is authorized to access this channel
    return (int) $user->id === (int) $id;
});