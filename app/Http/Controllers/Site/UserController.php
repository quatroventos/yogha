<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display the add user form
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function edit($user_id = "")
    {
        $countries = Countries::all();
        $roles = \DB::table('user_roles')->get();

        //dd($countries);

        if($user_id == "") {
            //novo usuário
            return view('admin.auth.register', compact('roles', 'countries'));
        }else{
            //edita usuário existente
            $user = \DB::table('users')
                ->select('users.*')
                ->where('id', '=', $user_id)
                ->first();

            return view('admin.auth.register', compact('roles', 'countries', 'user'));
        }
    }

    /**
     * Valida campos enviados
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'position' => ['required', 'integer', 'min:1'],
            'limit' => ['required', 'integer', 'min:1'],
            'shelfLayoutId' => ['required', 'integer', 'min:1'],
            'shelfFiltertId' => ['required', 'integer', 'min:1']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $data)
    {

        //cria arquivo de imagem a partir do blob
        if($data->imageBlob != '') {
            $folderPath = public_path('files/users/');

            $image_parts = explode(";base64,", $data->imageBlob);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';

            $imageFullPath = $folderPath . $imageName;

            file_put_contents($imageFullPath, $image_base64);
        }else{
            $imageName = $data->oldfile;
        }

        $birthday = implode('-', array_reverse(explode('/', $data['birthday'])));

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = $data['role_id'];
        $user->surname = $data['surname'];
        $user->phone = $data['phone'];
        $user->birthday = $birthday;
        $user->cpf = $data['cpf'];
        $user->country_id = $data['country'];
        $user->state_id = $data['state'];
        $user->city_id = $data['city'];
        $user->district = $data['district'];
        $user->zip_code = $data['zip_code'];
        $user->street = $data['street'];
        $user->number = $data['number'];
        $user->complement = $data['complement'];
        $user->profile_pic = $imageName;
        $user->save();

        return redirect('/email_verification');
    }

    /**
     * Atualiza usuário
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function update(Request $data){

        //cria arquivo de imagem a partir do blob
        if($data->imageBlob != '') {
            $folderPath = public_path('files/users/');

            $image_parts = explode(";base64,", $data->imageBlob);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';

            $imageFullPath = $folderPath . $imageName;

            file_put_contents($imageFullPath, $image_base64);
        }else{
            $imageName = $data->oldfile;
        }

        $birthday = implode('-', array_reverse(explode('/', $data['birthday'])));

        $user = User::where("id", $data['id'])->update([
            "name" => $data['name'],
            "email" => $data['email'],
            "role_id" => $data['role_id'],
            "surname" => $data['surname'],
            "phone" => $data['phone'],
            "birthday" => $birthday,
            "cpf" => $data['cpf'],
            "country_id" => $data['country'],
            "state_id" => $data['state'],
            "city_id" => $data['city'],
            "district" => $data['district'],
            "zip_code" => $data['zip_code'],
            "street" => $data['street'],
            "number" => $data['number'],
            "complement" => $data['complement'],
            "profile_pic" => $imageName
        ]);
        return redirect('/')->with('success', 'Usuário alterado!');
    }


    /**
     * Atualiza senha do usuario
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function password(Request $data){

        $user = User::where("id", $data['id'])->update([
            "password" => Hash::make($data['password'])
        ]);
        return redirect('/')->with('success', 'Senha alterada!');
    }

    public function email_verification(){
        echo view('auth.verify');
    }
}
