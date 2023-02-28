<?php

namespace App\Http\Controllers\Users;

use App\Helpers\PasswordHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\ServicioResource;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\Servicio;
use App\Models\User;
use App\Notifications\UserStoredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
        // Uso del gate para que pueda gestionar las cárceles a partir del rol establecido
        $this->middleware('can:manage-roles');
    }

    public function index()
    {
        // Obtener la colección de pabellones
        $roles = Servicio::orderBy('name', 'asc')->get();
        // Invoca el controlador padre para la respuesta json
        // El moldeo de la información por el Resource
        return $this->sendResponse(message: 'Servicio list generated successfully', result: [
            'roles' => RoleResource::collection($roles)
        ]);
    }

}
