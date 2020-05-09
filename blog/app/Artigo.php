<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo','descricao','conteudo','data'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function listaArtigos($paginate)
    {
        $user = \Auth::user();
        
        $listaArtigos =  DB::table('artigos')
                ->join('users','users.id','=','artigos.user_id')
                ->select('artigos.id','artigos.titulo','artigos.descricao','users.name','artigos.data')
                ->whereNull('deleted_at')
                ->orderBy('artigos.id','desc')
                ->paginate($paginate);
        
        if($user->admin != 'S') {
            $listaArtigos = $listaArtigos->where('artigos.user_id','=',$user->id);
        }

        return $listaArtigos;
    }

    public static function listaArtigosSite($paginate, $busca = null)
    {
        $listaArtigos = DB::table('artigos')
                ->join('users','users.id','=','artigos.user_id')
                ->select('artigos.id','artigos.titulo','artigos.descricao','users.name as autor','artigos.data')
                ->whereNull('deleted_at')
                ->whereDate('data','<=',date('Y-m-d'))
                ->orderBy('data','desc')
                ->paginate($paginate);
        
        if($busca && $busca != "") {
            $listaArtigos = $listaArtigos->where(function ($query) use ($busca){
                $query->orWhere('titulo','like','%'.$busca.'%')
                    ->orWhere('descricao','like','%'.$busca.'%');
            });
        }

        return $listaArtigos;
    }
}
