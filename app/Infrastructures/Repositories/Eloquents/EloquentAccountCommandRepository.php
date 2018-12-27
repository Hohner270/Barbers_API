<?php

namespace App\Infrastructures\Repositories\Eloquents;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Domains\Models\Account\Guest;
use App\Domains\Models\BaseAccount\Account;
use App\Domains\Models\BaseAccount\AccountId;
use App\Domains\Models\Email\EmailAddress;
use App\Domains\Models\Hash;

use App\Domains\UseCases\Accounts\AccountUseCaseCommand;

use App\Infrastructures\Entities\Eloquents\EloquentUser;
use App\Infrastructures\Entities\Eloquents\EloquentInvitationToken;

class EloquentAccountCommandRepository implements AccountUseCaseCommand
{
    /**
     * @var EloquentUser
     */
    private $eloquentUser;

    /**
     * @var EloquentInvitationToken
     */
    private $eloquentInvitationToken;

    /**
     * @param EloquentUser
     * @param EloquentInvitationToken
     */
    public function __construct(
        EloquentUser $eloquentUser, 
        EloquentInvitationToken $eloquentInvitationToken
    ) {
        $this->eloquentUser = $eloquentUser;
        $this->eloquentInvitationToken = $eloquentInvitationToken;
    }

    /**
     * @param Guest
     * @return Account Stylist or Member
     */
    public function save(Guest $guest): Account
    {
        DB::beginTransaction();
        try {
            $user = $this->eloquentUser->firstOrCreate(
                [
                    'name'     => $guest->name()->value(),
                    'email'    => $guest->emailAddress()->value(),
                    'password' => $guest->password()->value(),
                ],
                [
                    'role_id'  => $guest->accountType()->value(),
                ]
            );
            DB::commit();
            return $user->toDomain();
        } catch (\PDOException $e) {
            DB::rollBack();
            // TODO:ログに吐き出す
            return false;
        }
    }

    /**
     * @param AccountId 招待者のアカウントID
     * @param EmailAddress 招待したメールアドレス
     * @param Hash 招待トークン
     * @return bool DB保存 成功 / 失敗
     */
    public function saveInvitationToken(AccountId $accountId, EmailAddress $emailAddress, Hash $token): bool
    {
        DB::beginTransaction();
        try {
            $invitationToken = $this->eloquentInvitationToken->firstOrNew(
                [
                    'user_id' => $accountId->value(),
                    'email' => $emailAddress->value(),
                    'token' => $token->value(),
                ]
            );

            if (! $invitationToken->wasRecentlyCreated) {
                $invitationToken->updated_at = Carbon::now();
            }

            $isSaved = $invitationToken->save();
            DB::commit();
            return $isSaved;

        } catch(\PDOException $e) {
            DB::rollBack();
            // TODO:ログに吐き出す
            return false;
        }

    }
}