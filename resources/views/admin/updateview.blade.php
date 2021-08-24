
    <x-app-layout>

    </x-app-layout>
    
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.admincss')
  </head>
  <body>
      <div class="container-scroller">
        @include('admin.navbar')

        <div class="container">
            <h2>Update Food Menu</h2>
             @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form  method="POST" action="{{url('/updatefood',$data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input style="color: white"  type="text" name="title" value="{{ $data->title }}"  class="form-control" >
                </div>
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
                <div class="form-group">
                  <label for="price">Price:</label>
                  <input style="color: white" type="num" name="price" value="{{$data->price}}" class="form-control" >
                </div>
                @error("price")
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea style="color: white" type="text" name="description"  class="form-control" >{{$data->description}}</textarea>
                  </div>
                  @error("description")
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="image">Old Image:</label>
                    <img height="200" width="200" src="/foodimage/{{$data->image}}" alt="">
                  </div>
                  <div class="form-group">
                    <label for="image">New Image:</label>
                    <input style="color: white" type="file" name="image" class="form-control" >
                  </div>
                  @error("image")
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                <button type="submit" value="save" class="btn btn-success">Submit</button>
              </form> 
              


          </div>

      </div>
  
    @include('admin.adminscript')
  </body>
  <script>
  $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>
</html>