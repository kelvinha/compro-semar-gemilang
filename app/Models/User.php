<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the blogs for the user.
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Get the media for the user.
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string|array $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        // Handle old role system (string column)
        if (!$this->role_id && $this->attributes['role'] ?? null) {
            if (is_string($roles)) {
                return strtolower($this->attributes['role']) === strtolower($roles);
            }

            foreach ($roles as $role) {
                if (strtolower($this->attributes['role']) === strtolower($role)) {
                    return true;
                }
            }

            return false;
        }

        // Handle new role system (relationship)
        if (!$this->role) {
            return false;
        }

        if (is_string($roles)) {
            return $this->role->name === $roles;
        }

        return in_array($this->role->name, $roles);
    }

    /**
     * Check if the user is a superadmin.
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('superadmin');
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        // For old system, check if role is Admin
        if (!$this->role_id && $this->attributes['role'] ?? null) {
            return strtolower($this->attributes['role']) === 'admin';
        }

        return $this->hasRole(['superadmin', 'admin']);
    }

    /**
     * Check if the user has a specific permission.
     *
     * @param string|array $permissions
     * @return bool
     */
    public function hasPermission($permissions)
    {
        return $this->role->hasPermission($permissions);
    }

    /**
     * Get the user's avatar URL.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    // Keep these methods for backward compatibility
    public function detailInstructor()
    {
        return $this->belongsTo(InstructorDetail::class, 'id', 'user_id');
    }

    public function detailStudent()
    {
        return $this->belongsTo(StudentDetail::class, 'id', 'user_id');
    }
}
