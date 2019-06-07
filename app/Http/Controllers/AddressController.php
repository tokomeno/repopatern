<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AddressRepository;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $users;

    protected $addresses;

    public function __construct(UserRepository $users, AddressRepository $addresses)
    {
        $this->users = $users;
        $this->addresses = $addresses;
    }

    public function index()
    {   
        //
    }
}
