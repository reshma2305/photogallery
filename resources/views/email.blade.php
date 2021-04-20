
<form action="{{ route('email/send')}}" method="post" enctype="multipart/form-data">@csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">General Information</div>
                <div class="card-body">
                    <div class="form-group">
                
                    
                    <div id="person">
						 <select name="person" class="form-control">
                            <option value="">select</option>
                            @foreach(App\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>        
                    </div>
                        
                    </div>
                    <input type="file" name="file[]">
                    <div class="form-group">
                        <textarea name="body" class="form-control"></textarea>
                    </div>
                    
            <br>
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Submit</button>
            </div>
        </div>
      
    </div>
</form>