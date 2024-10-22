<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $user_name
 * @property string $method
 * @property string $action_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereActionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereUserName($value)
 */
	class AdminLog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property bool $is_accepted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AdminMessageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereIsAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminMessage whereUserId($value)
 */
	class AdminMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $kebab_id
 * @property int $user_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kebab $kebab
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CommentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereKebabId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo_url
 * @property string $address
 * @property int $coordinates_x
 * @property int $coordinates_y
 * @property int|null $opening_year
 * @property int|null $closing_year
 * @property mixed $status
 * @property bool $is_kraft
 * @property bool $is_food_truck
 * @property string|null $network
 * @property string|null $app_link
 * @property string|null $website_link
 * @property bool $has_glovo
 * @property bool $has_pyszne
 * @property bool $has_ubereats
 * @property string|null $phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MeatType> $meatTypes
 * @property-read int|null $meat_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OpeningHoursDay> $openingHours
 * @property-read int|null $opening_hours_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sauce> $sauces
 * @property-read int|null $sauces_count
 * @method static \Database\Factories\KebabFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereAppLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereClosingYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereCoordinatesX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereCoordinatesY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereHasGlovo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereHasPyszne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereHasUbereats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereIsFoodTruck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereIsKraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereNetwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereOpeningYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kebab whereWebsiteLink($value)
 */
	class Kebab extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kebab> $kebabs
 * @property-read int|null $kebabs_count
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeatType whereUpdatedAt($value)
 */
	class MeatType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $kebab_id
 * @property \App\WeekDay $week_day
 * @property \Carbon\Carbon $opens_at
 * @property \Carbon\Carbon $closes_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kebab|null $kebab
 * @method static \Database\Factories\OpeningHoursDayFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay query()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereClosesAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereKebabId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereOpensAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHoursDay whereWeekDay($value)
 */
	class OpeningHoursDay extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property bool $is_spicy
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kebab> $kebabs
 * @property-read int|null $kebabs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce whereIsSpicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sauce whereUpdatedAt($value)
 */
	class Sauce extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property bool $is_admin
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $must_change_password
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AdminMessage> $adminMessages
 * @property-read int|null $admin_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kebab> $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMustChangePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject {}
}

