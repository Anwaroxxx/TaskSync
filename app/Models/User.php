<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Check if the user is an organizer.
     */
    public function isOrganizer(): bool
    {
        return $this->role === 'organizer';
    }

    /**
     * Check if the user is a participant.
     */
    public function isParticipant(): bool
    {
        return $this->role === 'participant';
    }

    /**
     * Get the tasks created by the organizer.
     */
    public function organizerTasks()
    {
        return $this->hasMany(Task::class, 'manager_id');
    }

    /**
     * Get the tasks assigned to the participant.
     */
    public function participantTasks()
    {
        return $this->hasMany(Task::class, 'employee_id');
    }

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
