<?php

namespace Chatty\Plus\Users;

use DB;
use Event;

use Chatty\Plus\Statuses\Status;
use Chatty\Plus\Collections\Collection;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'tbl_users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'location',
        'first_name',
        'last_name',
        'email',
        'password',
        'profilePic'
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    //register new user
    public static function register($username, $email, $password)
    {
      $user = new static(compact('username','email','password'));

      //raise eventfor onRegister
      $this->fire(new UserRegistered);
    }

    //follow user relationship
    public function follows()
    {
        return $this->belongsToMany(self::class, 'tbl_connections', 'user_id', 'connection_id');
    }
    // method to create various likes
    public function likes()
    {
        return $this->hasMany('Chatty\Plus\Likeables\Likeable', 'user_id');
    }

    public function getIsAdminAttribute(){
        return true;
    }
    // Relationship to STATUS table

    public function statuses()
    {
        return $this->hasMany('Chatty\Plus\Statuses\Status', 'user_id');
    }


    public function products()
    {
        return $this->hasMany('Chatty\Plus\Products\Product');
    }



    public function services()
    {
        return $this->hasMany('Chatty\Plus\Services\Service', 'user_id');
    }

    public function collections()
    {
        return $this->hasMany('Chatty\Plus\Collections\Collection', 'user_id');
    }

    /**
     *
     * HELPER functions  to get various user name combinations
     *
     */
    // get full name
    public function getName()
    {
        if ($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }
        if ($this->first_name) {
            return $this->first_name;
        }
        return null;
    }

    // get name or username
    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    // get first- or username
    public function getFirstnameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }

    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/{{md5($this->email)}}?d=mm&s=50";
    }

 /**
     *
     * Relationships with ENDORSEMENTS table
     *
     */

    public function endorsements(){
        $friendsList =
            $this->myEndorsed()->get()
                ->merge( $this->endorsedBy()->get() );
        //dd($friendsList);
        return $endorserList;
    }

    /**
     * Endorsement handling
     */

    public function myEndorsed(){
        return $this->belongsToMany('Chatty\Plus\Users\User', 'tbl_endorsements', 'user_id', 'endorser_id');
    }

    public function endorsedBy(){
        return $this->belongsToMany('Chatty\Plus\Users\User', 'tbl_endorsements', 'endorser_id', 'user_id');
    }

    public function hasEndorsed(User $user){
        return (bool) $this->endorsedBy()->where('user_id', $user->id)->count();
    }

    public function addEndorsement(User $user){
        return $this->endorsedBy()->attach($user->id);

    }


    /**
     *
     * Relationships with FRIENDS table
     *
     */
    public function friendsOfMine()
    {

        return $this->belongsToMany('Chatty\Plus\Users\User', 'tbl_connections', 'user_id', 'connection_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany('Chatty\Plus\Users\User', 'tbl_connections', 'connection_id', 'user_id');
    }

    public function friends()
    {
        $friendsList =
            $this->friendsOfMine()->wherePivot('accepted', true)->get()
                ->merge( $this->friendOf()->wherePivot('accepted', true )->get() );
        //dd($friendsList);
        return $friendsList;
    }


    /**
     * FRIEND REQUESTS handling
     */
    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriend(User $user)
    {
        return $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        return $this->friendRequests()->where('id', $user->id)->first()
                ->pivot->update(['accepted' => true]);
    }

    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }


    // find out if a user has already liked a certain status
    public function hasLikedStatus(Status $status)
    {
        return (bool) $status->likes
            ->where('likeable_id', $status->id)
            ->where('likeable_type', get_class($status))
            ->where('user_id', $this->id)
            ->count();
    }

	/**
     *
     * HELPER functions  to get various user name combinations
     *
     */
    //  get this user's rating of endorsements
    public function getEndorsementRating(User $user)
    {
        $numEndorsements = (int) DB::table('tbl_endorsements')->where('user_id', $user->id)->count();
        if($numEndorsements>=5)
            return 5;
        else
            return (int) DB::table('tbl_endorsements')->where('user_id', $user->id)->count();

    }
}
