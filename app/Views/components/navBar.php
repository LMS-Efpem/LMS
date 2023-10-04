

<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-info">
<div class="container">
    <a href="#" class="navbar-brand mb-0 h1">
        <img class="d-inline-block align-top" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
            width="30" height="30"/>
            ABC
    </a>
    <button
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarNav"
    class="navbar-toggler"
    aria-controls="navbarNav"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"
        id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="#" class="nav-link active">
                  Perfil
                </a>
            </li>
            <li class="nav-item active">
                <a href="#" class="nav-link active">
                  Calificaciones
                </a>
            </li>
            <li class="nav-item active">
                <a href="#" class="nav-link active">
                  Carga Académica
                </a>
            </li>
        </ul>

        <div class="position-absolute top-0 end-0">
          <ul class="navbar-nav">
            <li class="nav-item active dropdown">
              <a href="#"
              class="nav-link active dropdown-toggle"
              id="navbarDropdown" role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                       <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                       <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start"
              aria-labelledby="navbarDropdown">
              <li class="dropdown-item">
                Usuario: <? $user ?>
              </li>
              <li class="dropdown-item">
                Nombre: <? $name ?>
              </li>
              <li class="dropdown-item">
                Apellidos: <? $lastname ?>
              </li>
              <li>
                <a href="#"
                class="dropdown-item">
                  Cerrar Sesión
                </a>
              </li>
              </ul>
            </li>
          </ul>
        </div>
    </div>
    </div>
</nav>

