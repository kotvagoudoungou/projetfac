@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7" style="font-family: century;">
            <div class="card">
              <div class="card-header">
                <h2>News Registration</h2>
              </div>
              <div class="card-body">
                  <form action="{{ route('ajouter') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Titre</label><br>
                        <input name="nom" type="text" class="form-control form-control-user"  placeholder="titre du news">
                    </div>
                    <div class="form-group">
                         <label class="label">Contenu : </label><br>
                          <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label">Source : </label>
                        <input class="input" name="source" type="text" placeholder="e.g : www.altitop.org/web/id=1" >
                    </div>
                      <label class="label">Categorie</label><br>
                      <select name="categorie" class="form-control"> 
                          @foreach($categories as $key)
                            <option value="{{$key->id}}">
                                {{$key->nom}}
                            </option>
                          @endforeach                  
                      </select><br>
                    <div class="input-group">
                      <div class="p-t-15" align='center'>
                         <button class="btn btn-success" type="submit">
                                Enregistrer
                          </button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

