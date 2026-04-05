<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
/**
 * @OA\Info(
 *     title="API de Usuario",
 *     version="1.0.0",
 *     description="Documentación de la API de usuario en Laravel 10",
 *     @OA\Contact(
 *         email="garciacornejod0qgmail.com",
 *         name="David Antonio Garcia Cornejo"
 *     )
 * )
 */
class UsuarioController extends Controller
{
    
    public function login(Request $request){
         $usuario = Usuario::where('correo', $request->correo)->first();
                      //->where('password', $request->password)

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Verificar la contraseña
        if (Hash::check($request->password, $usuario->password)) {
            // Contraseña correcta
            return response()->json(['message' => 'Login exitoso', 'usuario' => $usuario]);
        } else {
            // Contraseña incorrecta
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }
    }

    public function registrarUsuario(Request $request){
        
        $token = Str::random(60);

        Usuario::create([
            'correo' => $request->correo,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'genero' => $request->genero,
            'token' => $token
        ]);

        return response()->json(['message' => 'Usuario registrado correctamente']);
    }
    //listar
    public function listar(Request $request){
        return Usuario::all();
    }

    //modificar
    public function modificar(Request $request){
        $usuario = Usuario::where('id', $request->id)->first();
        if($request->correo!=''){
            $usuario->correo = $request->correo;
        }
        if($request->username!=''){
            $usuario->username = $request->username;
        }
        
        if($request->genero!=''){
            $usuario->genero = $request->genero;
        }
        $usuario->save();
    }

    public function prueba(Request $request){
        //return Usuario::all();
        return Usuario::all();
        //return "hola";
    }

    public function eliminar(Request $request){
        $usuario = Usuario::where('id', $request->id)->first();
        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }
    
}
