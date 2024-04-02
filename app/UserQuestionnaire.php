<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionnaire extends Model
{
    protected $fillable = [
        'user_id', 'user_questionnaire', 'file'
    ];

    /**
     * Adds a file path to the latest UserQuestionnaire record without a file.
     *
     * @param string $path The path to the file.
     * @return bool True if the update was successful, false otherwise.
     */
    public function addFile(string $path): bool
    {
        return UserQuestionnaire::whereNull('file')
            ->orderByDesc('id')
            ->update(['file' => $path]) > 0;
    }

    /**
     * Retrieves specific user questionnaire data based on user ID.
     *
     * @param int $user_id The ID of the user.
     * @return array|null An array of user data or null if no data is found.
     */
    public function getUserQuestionnaire(int $user_id): ?array
    {
        $userQuestionnaire = UserQuestionnaire::where('user_id', $user_id)->first();

        if ($userQuestionnaire && $userProfile = json_decode($userQuestionnaire->user_questionnaire)) {
            return array_filter($userProfile, function ($value) {
                return in_array($value->q, ['medicalCondition', 'foodAllergy']);
            });
        }

        return null;
    }
}
