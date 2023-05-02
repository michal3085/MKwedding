<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildRequest;
use App\Mail\ConfirmedBy;
use App\Models\Guest;
use App\Models\User;
use App\Services\Child\StoreService;
use mysql_xdevapi\Exception;


class ChildController extends Controller
{
    private $emails;

    public function __construct()
    {
        parent::__construct();

        $this->emails = User::where('mail_notifications', 1)->get();
    }

    public function addChild($id)
    {
        return view('children')->with([
            'gid' => $id
        ]);
    }

    public function saveChild(StoreChildRequest $request, StoreService $service, $id)
    {
        if ($this->confirmation_time === true) {
            $data = $service->doService($request, $id);
            $status = 'child_added';
        } else {
            $status = 'after_confirmation_time';
        }

        return view('confirmed')->with([
            'data' => $data,
            'name' => $data->name,
            'surname' => $data->surname,
            'gid' => $data->id,
            'status' => $status,
        ]);
    }

    public function showChildren($child_id, $gid)
    {
        $children = Guest::where('id', $child_id)->first();
        $status = 'none';

        if ($this->confirmation_time === true) {
            if ($children->confirmed == 0) {
                $parent = Guest::where('id', $gid)->first();

                $children->confirmed = 1;
                $children->save();
                $status = 'child_add';

                foreach ($this->emails as $email) Mail::to($email->email)
                    ->send(new ConfirmedBy(
                        $children->name . ' ' . $children->surname,
                        $parent->name . ' ' . $parent->surname,
                        1
                    ));
            }
        } else {
            $status = 'after_confirmation_time';
        }

        return view('confirmed')->with([
            'data' => $children,
            'name' => $children->name,
            'surname' => $children->surname,
            'gid' => $children->id,
            'status' => $status,
        ]);
    }
}
