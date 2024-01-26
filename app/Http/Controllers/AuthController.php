<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function store(){
        $companyRequest = new Request([
            '_token'=>request('_token'),
            'company_name'=>request('company_name'),
            'company_cnpj'=>preg_replace('/\D/', '',request('cnpj')),
        ]);

        $personRequest = new Request([
            '_token'=>request('_token'),
            'name'=>request('name'),
            'cellphone'=>preg_replace('/\D/', '',request('cellphone')),
            'company_role'=>request('role'),
            'email'=>request('email'),
        ]);

        $userRequest = new Request([
            '_token'=>request('_token'),
            'name'=>request('username'),
            'password'=>request('password'),
            'password_confirmation'=>request('password_confirmation'),
        ]);

        $validated_company = $companyRequest->validate(
            [
            'company_name' => 'required|min:3|max:40',
            'company_cnpj' => 'required|min:14|max:14|unique:companies,company_cnpj',
            ]
        );

        $validated_person = $personRequest->validate(
            [
            'name' => 'required|min:3|max:40',
            'cellphone' => 'required|min:11|max:11',
            'company_role' => 'required|min:3|max:40',
            'email' => 'required|email|unique:people,email|max:255',
            ]
        );

        $validated_user = $userRequest->validate(
            [
            'name' => 'required|min:3|max:40',
            'password' => 'required| confirmed | min:8 ',
            'password_confirmation' => 'required',
            ]
        );

        //Cria a empresa
        $company = Company::create($validated_company);

        if(!$company){
           printf("erro empresa");
        }

        $validated_person['company_id'] = $company->id;

        //Cria a pessoa
        $person = Person::create($validated_person);

        if(!$person){
           printf("erro pessoa");
        }

        $validated_user['person_id'] = $person->id;

        //Criptografa a senha
        $validated_user['password'] = bcrypt($validated_user['password']);

        //Cria o usuario
        $user = User::create($validated_user);

        if(!$user){
            printf("erro usuario");
        }

        //Loga o usuario
        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'User created!');
    }

    public function authenticate(){
        $credentials = request()->validate(
            [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
            ]
        );

        if(auth()->attempt($credentials)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'User logged!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout(){
        auth()->logout(); //Desloga o usuario
        request()->session()->invalidate(); //Limpa a sessao
        request()->session()->regenerateToken();//Gera um novo token
        return redirect()->route('login');
    }
}
