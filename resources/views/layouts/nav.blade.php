<nav class="navbar navbar-expand-lg navbar-light bg-light px-md-4">
    <a class="navbar-brand" href="#">TaskO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav
       ms-auto 
       ">
        <li class="nav-item active">
          <a class="nav-link" href="/tasks">Home</a>
        </li>
        <li class="nav-item">
          <a type="button" data-bs-target="#create" data-bs-toggle="modal" class="nav-link" >Create</a>
        </li>
       
      </ul>
     
    </div>
  </nav>
  @include('task.create')