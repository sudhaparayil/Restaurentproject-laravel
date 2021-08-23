
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
            <h2>Users List</h2>
                       
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  @if ($user->usertype=="0")
                  <td><a href="deleteuser/{{$user->id}}">Delete</a></td>
                  @else
                  <td>Not Allowed</td>
                  @endif
                  
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>
          </div>

      </div>
  
    @include('admin.adminscript')
  </body>
</html>