<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\UserRequest;
use App\User;
use App\Categoria;
use Mail;

class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  private $path = 'administracion/usuarios/';

  //Referencia al middleware
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('has.permission:gestionar_usuarios',['only'=>['index','create','store','show','edit','update']]);
    $this->middleware('has.permission:editar_perfil',['only'=>['editarPerfil','editarPerfilUpdate','asignarTarjeta']]);
    $this->middleware('has.permission:cambiar_contrasena',['only'=>['editPassword','actualizarPassword']]);

  }
  public function index(Request $request)
  {
      $users=User::join('role_user', 'users.id', '=', 'role_user.user_id')
      ->join('roles', 'role_user.role_id', '=', 'roles.id')
      ->select('users.*','roles.name')->get();

       return view($this->path.'index',compact('users'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $roles=Role::where('slug','<>','cliente')->pluck('name','id');
    return view($this->path.'create',compact('roles'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */



  public function store(UserRequest $request)
  {
    try{
      $user = new User($request->all());
      $user->es_cliente=0;
      $pass=substr(md5(microtime()),1,6);
      $user->password=bcrypt($pass);
      //se modificará para hacer una contraseña aleatoria y mandar un correo con datos
      if($user->save()){

        $user->assignRole($request->role);

        Mail::send('administracion.email.usuario',['user'=>$user,'pass' => $pass ], function ($m) use ($user){
              $m->to($user->email,$user->primerNombre);
              $m->subject('Contraseña y nombre de usuario');
              $m->from('panonline503@gmail.com','Panadería Lila');
                                                  });
      }

     return redirect()->action('UserController@index')->with('msj','Usuario Registrado');
    }catch(Exception $e){
      return back()->with('msj2','Usuario no registrado, es posible que el username ya se encuentre registrado');
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $user=User::findOrFail($id);
    return view($this->path.'show',compact('user'));
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $Rolu=Role::join('role_user', 'roles.id', '=', 'role_user.role_id')->where('role_user.user_id','=',$id)
    ->select('roles.id')->get();
    foreach($Rolu as $rol){
      $idRol=$rol->id;
    }
  $user=User::findOrFail($id);
  $roles=Role::pluck('name','id')->toArray();

   return view ($this->path.'edit',compact('user','roles','idRol'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
      $this->validate($request,[
        'primerNombre' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        'segundoNombre' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        'primerApellido' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        'segundoApellido' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        'direccion'=>'string|max:100',

      ]);
      try{
        $user=User::findOrFail($id);
        $user->primerNombre=$request->primerNombre;
        $user->segundoNombre=$request->segundoNombre;
        $user->primerApellido=$request->primerApellido;
        $user->segundoApellido=$request->segundoApellido;
        $user->save();
        $user->roles()->sync($request->get('role'));
      return redirect()->action('UserController@index')->with('msj','Actualizado con éxito');
      }catch(Exception $e){
        return back()->with('msj2','Usuario no editado,revise los datos proporcionados');
      }


  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
  }


  public function editPassword()
  {
    try{
      if(auth()->user()->isCliente()){
        $categorias = Categoria::all();
        return view('cliente.cambiarPassword',compact('categorias'));
      }else{

        return view($this->path.'editarPassword');
      }
    }catch(Exception $e){
      return "Error al intentar modificar al Usuario".$e->getMessage();
    }

  }


  public function actualizarPassword(Request $request, $id){

    $this->validate($request,[
      'old_password' => 'required|string|min:6',
      'password' => 'confirmed|required|string|min:6',

    ]);
    $user=User::findOrFail($id);
    $almacenada=$user->password;
    $recibida=$request->old_password;

    if (Hash::check($recibida, $almacenada)) {
      $nueva_password=$request->password;
      $user->password=bcrypt($nueva_password);
      $user->save();
        return redirect()->action('TiendaController@miperfil')->with('msj','Contraseña actualizada con éxito');


    }else{
      //  return redirect()->action('UserController@show',['id' => $user->id])->with('msj2','La contraseña anterior está incorrecta, intentelo nuevamente');
    }
  }

  public function asignarTarjeta(Request $request, $id){

    $this->validate($request,[
      'tarjeta_credito' => 'nullable|string|max:19|min:19|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
    ]);

    try {
      $user = User::findOrFail(auth()->user()->id);

      $user->tarjeta_credito = $request->tarjeta_credito;
      $user->update();


    return redirect()->back()->with('info', 'Asignado Correctamente');
    } catch (Exception $e) {

    }

  }

  public function editarPerfil($id){
    if(auth()->user()->isCliente()){
      $user = User::findOrFail(auth()->user()->id);
      $categorias = Categoria::all();
      return view('cliente.editarPerfil',compact('user','categorias'));
    }else{
      $user = User::findOrFail(auth()->user()->id);
      return view($this->path.'editarPerfil',compact('user'));
    }
  }

  public function editarPerfilUpdate(Request $request, $id){

    $this->validate($request,[
      'primerNombre' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'segundoNombre' => 'nullable|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'primerApellido' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'segundoApellido' => 'nullable|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'direccion'=>'string|max:100',
      'tarjeta_credito' => 'nullable|string|max:19|min:19|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',

    ]);
    try{
      $user=User::findOrFail($id);
      $user->primerNombre=$request->primerNombre;
      $user->segundoNombre=$request->segundoNombre;
      $user->primerApellido=$request->primerApellido;
      $user->segundoApellido=$request->segundoApellido;
      $user->tarjeta_credito=$request->tarjeta_credito;
      $user->email=$request->email;
      $user->direccion=$request->direccion;

      $user->update();
        return redirect()->action('TiendaController@miperfil');

    }catch(Exception $e){
      return back()->with('msj2','Usuario no editado,revise los datos proporcionados');
    }




  }


}
