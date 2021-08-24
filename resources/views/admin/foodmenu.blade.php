
    <x-app-layout>

    </x-app-layout>
    
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
      <div class="container-scroller">
        @include('admin.navbar')

        <div class="container">
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif --}}
            <div class="row py-2">
                <div class="col-xl-6">
                    @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('success')}}
                        </div>
    
                    @elseif(Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('failed')}}
                        </div>
                    @endif
                </div>
            </div>
       
            <h2>Add Food Menu</h2>
            <form  method="POST" action="{{url('/uploadfood')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input style="color: white"  type="text" name="title" value="{{old('title')}}" class="form-control" >
                </div>
                @error("title")
                <p style= "color:red">{{$errors->first("title")}}</p>
                @enderror
                <div class="form-group">
                  <label for="price">Price:</label>
                  <input style="color: white" type="num" name="price" value="{{old('price')}}" class="form-control" >
                </div>
                @error("price")
                <p style= "color:red">{{$errors->first("price")}}</p>
                @enderror
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input style="color: white" type="file" name="image" class="form-control" >
                  </div>
                  @error("image")
                  <p style= "color:red">{{$errors->first("image")}}</p>
                  @enderror
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea style="color: white" type="text" name="description" value="{{old('description')}}"  class="form-control" ></textarea>
                  </div>
                  @error("description")
                  <p style= "color:red">{{$errors->first("description")}}</p>
                  @enderror
                <button type="submit" value="save" class="btn btn-success">Submit</button>
              </form> 
              
              <div class="">
                <h2>Food Menu Items List</h2>
                            
                <table class="table">
                  <thead>
                    <tr>
                      <th>Food Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                      <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->description}}</td>
                        <td><img src="/foodimage/{{$item->image}}" alt=""></td>
                        <td><a href="{{url('/deletemenu',$item->id)}}">Delete</a></td>
                        <td><a href="{{url('/updateview',$item->id)}}">Update</a></td>
                      </tr>
                      @endforeach
                    
                  </tbody>
                </table>
                {{$data->links()}}
              </div>

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